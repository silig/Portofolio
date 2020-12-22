<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ActivationUser;
use App\Models\Profil;
use App\Mail\ActivationEmail;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
            'user_access' => 'user',
            'active' => 'no'
        ]);

        $verificationUser = ActivationUser::create([
            'user_id' => $user->id,
            'token' => str::random(40)
        ]);

        $profil = Profil::create([
            'user_id' => $user->id
        ]);
        

        Mail::to($user->email)->send(new ActivationEmail($user));

        return $user;
    }

    //untuk mengonformasi akun user
    public function konfirmasi($email,$token)
    {
        $verificationUser = ActivationUser::where('token', $token)->first();
        if(isset($verificationUser) ){
            $user = $verificationUser->user;
            //dd($user->email_verified_at);
            if(!$user->email_verified_at) {
                $verificationUser->user->active = 'yes';
                $verificationUser->user->email_verified_at = date('Y-m-d H:i:s');;
                $verificationUser->user->save();
                $status = "Email Kamu Terlah Terverifikasi. Silahkan login sekarang juga.";
            }else{
                $status = "Email Kamu Terlah Terverifikasi Sebelumnya. Silahkan login sekarang juga.";
            }
        }else{
            return redirect('/login')->with('warning', "Maaf Email Tidak dapat di identifikasi.");
        }
 
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'Kami Mengirimkan Code Konfirmasi. Cek Email Kamu dan Ikuti Link Verify Email.');
    }

}
