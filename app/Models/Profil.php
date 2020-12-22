<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{

	protected $table = 'tb_profil';
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 

    public function bahasa()
    {
    	return $this->hasMany('App\Models\Bahasa');
    }

    public function hobi()
    {
    	return $this->hasMany('App\Models\Hobi');
    }

    public function pendidikan()
    {
    	return $this->hasMany('App\Models\Pendidikan');
    }

    public function pengalaman()
    {
    	return $this->hasMany('App\Models\Pengalaman');
    }

    public function skill()
    {
    	return $this->hasMany('App\Models\Skill');
    }

    public function sosmed()
    {
    	return $this->hasMany('App\Models\Sosmed');
    }

    public function prestasi()
    {
        return $this->hasMany('App\Models\Prestasi');
    }
}
