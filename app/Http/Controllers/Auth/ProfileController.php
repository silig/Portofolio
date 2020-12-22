<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use JsValidator;
use Validator;
use App\Http\Controllers\Controller;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\profil;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Sosmed;
use App\Models\Prestasi;
use App\Models\Hobi;
use App\Models\Skill;
use File;
use Storage;
use DB;
use PDF;
use Mpdf;
use Response;
use Image;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    protected function validationRules() {
        $rule['now_password'] = 'required';
        $rule['password'] = 'required|min:5|confirmed|different:now_password';
        return $rule;
    }

    public function index()
    {
        $id = Auth::user()->id;
       
        if(Auth::user()->role_id == 1){
            $profile = $this->user->find($id);
            return view('auth.profil', compact('profile'));
        } else {
            $profile = $this->user->find($id); //tabel user
            $datadiri = $this->user->find($id)->profile; //tabel profil
            //dd($profile);
            $bahasa = profil::find($datadiri->id)->bahasa;
            $skill = profil::find($datadiri->id)->skill;
            $pendidikan = profil::find($datadiri->id)->pendidikan;
            $pengalaman = profil::find($datadiri->id)->pengalaman;
            $prestasi = profil::find($datadiri->id)->prestasi;
            $sosmed = profil::find($datadiri->id)->sosmed;
            $hobi = profil::find($datadiri->id)->hobi;
            
            //dd($datadiri->foto);
            return view('auth.profile', compact(['profile', 'datadiri', 'bahasa', 'skill', 'pendidikan', 'pengalaman', 'prestasi', 'sosmed', 'hobi']));
        }
    }

    public function changePassword(Request $request)
    {

        $id = Auth::user()->id;

        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());

            if (!(Hash::check($request->get('now_password'), Auth::user()->password))) {
                $validation->after(function($validation) {
                    $validation->errors()->add('now_password', 'Old password not same');
                });
            }

            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->user->changePassword($id, $request->get('password'));
                return redirect()->action('Auth\ProfileController@changePassword')->with('success', 'Password has been saved');;
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $profile = $this->user->find($id);

        return view('auth.changePassword', compact('profile','validator'));
    }

    public function form($id){

        $profil = Profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('alert','hello');
        } else {
            $sosmed = Profil::find($profil->id)->sosmed;
            // dd(count($sosmed) > 1);
            return view('profil.form', compact('profil', 'sosmed'));
        }
    }

    public function update_datadiri($profil_id, Request $request)
    {
       $this->validate($request, [
            'phone' => 'numeric',
            'foto' => 'mimes:jpeg,png|max:500',
        ], [
            'phone.numeric' => 'telepon harus angka',
            'foto.mimes' => 'harus format jpg atau png',
            'foto.max' => 'Ukuran File foto maksimal 1MB',
        ]);
        try{
        
        $model = profil::find($profil_id);
        if ($request->hasFile('foto')) {
                !empty($model->foto) ? File::delete(public_path('storage/uploads/foto/' . $model->foto)):null;
                $foto = $this->UploadAble($request->file('foto'));
            }

        $model->nama_lengkap = $request->nama_lengkap;
        $model->jenis_kelamin = $request->jk;
        $model->tempat_lahir = $request->tempat_lahir;
        $model->tgl_lahir = $request->tgl_lahir;
        $model->agama = $request->agama;
        $model->nim = $request->nim;
        $model->jurusan = $request->jurusan;
        $model->phone = $request->phone;
        $model->tentang = $request->tentang;
        $model->foto = $request->hasFile('foto') ? $foto : $model->foto;
        $model->save();

         return redirect()->back();

        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

    //untuk upload file
    public function UploadAble($file)
    {
        
        $NamaFile = $file->getClientOriginalName();
        $path = Storage_path('App/public/uploads/foto');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 
        Image::make($file)->resize(250, 300)->save($path . '/' . $NamaFile);
        //$file->storeas('public/uploads/foto/',$NamaFile);
        
        
        return $NamaFile;
    }

//create or update sosial media
    public function sosmed($profil_id, Request $request)
    {
        
        try {
                    
            foreach ($request->sosial_media as $key => $value) {
                
                $data = Sosmed::where('sosial_media', $request->sosial_media[$key])
                                              ->where('profil_id', $profil_id)->first();
                
                if(isset($data)){
                    
                    Sosmed::where('id', $request->id[$key])
                            ->update(['sosial_media' => $request->sosial_media[$key],
                                      'link' => $request->link[$key]]);

                } else{
                    Sosmed::create([
                        'profil_id' => $profil_id,
                        'sosial_media' => $request->sosial_media[$key],
                        'link' => $request->link[$key]]);
                }

                
            }

            return redirect()->back();
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus sosmed
    public function del_sosmed($id){

      if(isset($id)){  
        $sosmed = Sosmed::find($id);
        $sosmed->delete();
        return redirect()->back();
      } else {
        return redirect()->back();
      }
    }

//create or update pendidikan
    public function pendidikan($profil_id, Request $request)
    {
        //dd($request->all());
       try {
                    
            foreach ($request->tahun_mulai as $key => $value) {
                
                if($request->tahun_mulai[$key] != null && $request->tahun_selesai[$key] != null && $request->institusi[$key] != null) 
                {

                    if($request->id[$key] != null){
                        // $pendidikan = Pendidikan::update(
                        //     ['id' => $request->id[$key]],
                        //     ['profil_id'=> $profil_id, 'tahun_mulai' => $request->tahun_mulai[$key], 'tahun_selesai' => $request->tahun_selesai[$key],'institusi' => $request->institusi[$key] , 'nama_jurusan' => isset($request->jurusan[$key]) ? $request->jurusan[$key]:'']
                        // );

                        $pendidikan = Pendidikan::find($request->id[$key]);
                        $pendidikan->tahun_mulai = $request->tahun_mulai[$key];
                        $pendidikan->tahun_selesai = $request->tahun_selesai[$key];
                        $pendidikan->institusi = $request->institusi[$key];
                        $pendidikan->nama_jurusan = isset($request->jurusan[$key]) ? $request->jurusan[$key]: null;
                        $pendidikan->save();


                    } else {
                        Pendidikan::create(['profil_id'=> $profil_id, 'tahun_mulai' => $request->tahun_mulai[$key], 'tahun_selesai' => $request->tahun_selesai[$key],'institusi' => $request->institusi[$key] , 'nama_jurusan' => $request->jurusan[$key]]);
                    }
                } else if($request->tahun_mulai[$key] == null && $request->tahun_selesai[$key] == null && $request->id[$key] == null && $request->institusi[$key] == null)  {
                    echo 'do nothing';
                } 
                else if($request->tahun_mulai[$key] == null or $request->tahun_selesai[$key] == null or $request->id[$key] == null or $request->institusi[$key] == null)  {
                    echo 'do nothing';
                }
            }
            return redirect()->back()->with('success', 'Data has been updated');
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus pendidikan
    public function del_pendidikan($id){

        if($id == 'null'){
            return redirect()->back()->with('success', 'Data has been deleted');
        }
        else{
            $pendidikan = Pendidikan::find($id);
            $pendidikan->delete();
            return redirect()->back()->with('success', 'Data has been deleted');
        }
    }

//form pendidikan
    public function form_pendidikan($id){

        $profil = profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('warning','bukan ranah anda');
        } else {
            $pendidikan = profil::find($profil->id)->pendidikan;

            return view('form.pendidikan', compact('profil', 'pendidikan'));
        }
    }

//form pengalaman
    public function form_pengalaman($id){

        $profil = profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('alert','hello');
        } else {
            $pengalaman = profil::find($profil->id)->pengalaman;

            return view('form.pengalaman', compact('profil', 'pengalaman'));
        }
    }

//create or update pengalaman
    public function pengalaman($profil_id, Request $request)
    {
        //dd($request->all());
       try {
                    
            foreach ($request->pengalaman as $key => $value) {

                if($request->pengalaman[$key] != null && $request->penjelasan[$key] != null) 
                {
                    if($request->id[$key] != null){
                        $pengalaman = Pengalaman::updateOrCreate(
                            ['id' => $request->id[$key]],
                            ['profil_id'=> $profil_id, 'pengalaman' => $request->pengalaman[$key], 'penjelasan' => $request->penjelasan[$key]]
                        );
                    } else {
                        Pengalaman::create(['profil_id'=> $profil_id, 'pengalaman' => $request->pengalaman[$key], 'penjelasan' => $request->penjelasan[$key]]);
                    }
                } else if($request->pengalaman[$key] == null && $request->penjelasan[$key] == null && $request->id[$key] )  {
                    echo 'do nothing';
                } 
                else if($request->pengalaman[$key] == null or $request->penjelasan[$key] == null or $request->id[$key] == null)  {
                    echo 'do nothing';
                }
            }
            return redirect()->back()->with('success', 'Data has been updated');
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus pengalaman
    public function del_pengalaman($id){

        if($id == 'null'){
            return redirect()->back()->with('success', 'Data has been deleted');
        }
        else{
            $pengalaman = Pengalaman::find($id);
            $pengalaman->delete();
            return redirect()->back()->with('success', 'Data has been deleted');
        }
    }

//form prestasi
    public function form_prestasi($id){

        $profil = profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('warning','bukan ranah anda');
        } else {
            $prestasi = profil::find($profil->id)->prestasi;

            return view('form.prestasi', compact('profil', 'prestasi'));
        }
    }

//create or update prestasi
    public function prestasi($profil_id, Request $request)
    {
        //dd($request->all());
       try {
                    
            foreach ($request->tahun as $key => $value) {

                if($request->tahun[$key] != null && $request->prestasi[$key] != null) 
                {
                    if($request->id[$key] != null){
                        $Prestasi = Prestasi::updateOrCreate(
                            ['id' => $request->id[$key]],
                            ['profil_id'=> $profil_id, 'prestasi' => $request->prestasi[$key], 'tahun' => $request->tahun[$key]]
                        );
                    } else {
                        Prestasi::create(['profil_id'=> $profil_id, 'prestasi' => $request->prestasi[$key], 'tahun' => $request->tahun[$key]]);
                    }
                } else if($request->tahun[$key] == null && $request->prestasi[$key] == null && $request->id[$key] )  {
                    echo 'do nothing';
                } 
                else if($request->tahun[$key] == null or $request->prestasi[$key] == null or $request->id[$key] == null)  {
                    echo 'do nothing';
                }
            }
            return redirect()->back()->with('success', 'Data has been updated');
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus prestasi
    public function del_prestasi($id){

        if($id == 'null'){
            return redirect()->back()->with('success', 'Data has been deleted');
        }
        else{
            $Prestasi = Prestasi::find($id);
            $Prestasi->delete();
            return redirect()->back()->with('success', 'Data has been deleted');
        }
    }

//form hobi
    public function form_hobi($id){

        $profil = profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('warning','bukan ranah anda');
        } else {
            $hobi = profil::find($profil->id)->hobi;

            return view('form.hobi', compact('profil', 'hobi'));
        }
    }

//create or update hobi
    public function hobi($profil_id, Request $request)
    {
        //dd($request->all());
       try {
                    
            foreach ($request->hobi as $key => $value) {

                if($request->hobi[$key] != null) 
                {
                    if($request->id[$key] != null){
                        $hobi = Hobi::updateOrCreate(
                            ['id' => $request->id[$key]],
                            ['profil_id'=> $profil_id, 'nama_hobi' => $request->hobi[$key]]
                        );
                    } else {
                        Hobi::create(['profil_id'=> $profil_id, 'nama_hobi' => $request->hobi[$key]]);
                    }
                } else if($request->hobi[$key] == null )  {
                    echo 'do nothing';
                } 
                else if($request->hobi[$key] == null or $request->id[$key] == null)  {
                    echo 'do nothing';
                }
            }
            return redirect()->back()->with('success', 'Data has been updated');
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus hobi
    public function del_hobi($id){

        if($id == 'null'){
            return redirect()->back()->with('success', 'Data has been deleted');
        }
        else{
            $hobi = Hobi::find($id);
            $hobi->delete();
            return redirect()->back()->with('success', 'Data has been deleted');
        }
    }

//form skill
    public function form_skill($id){

        $profil = profil::find($id);
        //dd($profil->user_id);
        
        if($profil->user_id != Auth::user()->id){
             return redirect()->back()->with('warning','bukan ranah anda');
        } else {
            $skill = profil::find($profil->id)->skill;

            return view('form.skill', compact('profil', 'skill'));
        }
    }

//create or update skill
    public function skill($profil_id, Request $request)
    {
        //dd($request->all());
       try {
                    
            foreach ($request->skill as $key => $value) {

                if($request->skill[$key] != null) 
                {
                    if($request->id[$key] != null){
                        $skill = Skill::updateOrCreate(
                            ['id' => $request->id[$key]],
                            ['profil_id'=> $profil_id, 'skill' => $request->skill[$key],
                             'kemahiran' => $request->kemahiran[$key]]
                        );
                    } else {
                        Skill::create(['profil_id'=> $profil_id, 'skill' => $request->skill[$key], 'kemahiran' => $request->kemahiran[$key]]);
                    }
                } else if($request->skill[$key] == null && $request->kemahiran[$key] == null)  {
                    echo 'do nothing';
                } 
                else if($request->skill[$key] == null or $request->id[$key] == null or $request->kemahiran[$key] == null)  {
                    echo 'do nothing';
                }
            }
            return redirect()->back()->with('success', 'Data has been updated');
        } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
    }

//hapus skill
    public function del_skill($id){

        if($id == 'null'){
            return redirect()->back()->with('success', 'Data has been deleted');
        }
        else{
            $skill = Skill::find($id);
            $skill->delete();
            return redirect()->back()->with('success', 'Data has been deleted');
        }
    }

//download to pdf
    public function download($id){
            $datadiri = profil::find($id);
            $profile = profil::find($id)->user;
            $bahasa = profil::find($id)->bahasa;
            $skill = profil::find($id)->skill;
            $pendidikan = profil::find($id)->pendidikan;
            $pengalaman = profil::find($id)->pengalaman;
            $prestasi = profil::find($id)->prestasi;
            $sosmed = profil::find($id)->sosmed;
            $hobi = profil::find($id)->hobi;

            
            //$dompdf=Mpdf::loadView('profil.cv', compact('datadiri', 'profile','skill','pendidikan','pengalaman','prestasi', 'sosmed', 'hobi'));
            return view('profil.cv', compact('datadiri', 'profile','skill','pendidikan','pengalaman','prestasi', 'sosmed', 'hobi'));
            //return $dompdf->stream();
    }
}
