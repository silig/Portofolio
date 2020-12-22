<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Models\User;
use App\Models\profil;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected $model;

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        return view('search.index');
    }

    public function autocomplete(Request $request)
    {
        $search = $request->get('term');
       $data = Profil::select("nama_lengkap")
                ->where("nama_lengkap","LIKE","%".$search."%")
                ->orWhere("nim","LIKE","%".$search."%")
                ->get();
   
        return response()->json($data);
    }

    public function result(Request $slug){

    $datadiri = profil::where("nama_lengkap",$slug->search)->first();
    $bahasa = profil::find($datadiri->id)->bahasa;
    $skill = profil::find($datadiri->id)->skill;
    $pendidikan = profil::find($datadiri->id)->pendidikan;
    $pengalaman = profil::find($datadiri->id)->pengalaman;
    $prestasi = profil::find($datadiri->id)->prestasi;
    $sosmed = profil::find($datadiri->id)->sosmed;
    $hobi = profil::find($datadiri->id)->hobi;
    $email = profil::find($datadiri->id)->user->email;
    
    return view('search.result', compact(['datadiri', 'bahasa', 'skill', 'pendidikan', 'pengalaman', 'prestasi', 'sosmed', 'hobi', 'email']));
    }
}
