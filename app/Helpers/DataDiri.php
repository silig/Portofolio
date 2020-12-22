<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class DataDiri {

    public static function CekData($userid) 
    {
        $profil = User::find($userid)->profile;

        if(!isset($profil->nim) && !isset($profil->tempat_lahir) && !isset($profil->tgl_lahir) && !isset($profil->alamat))
        {
        	return redirect(route('dashboard'))->with(['status' => 'data diri belum dilengkapi']);
        }

        return redirect(route('dashboard'));
    }
}