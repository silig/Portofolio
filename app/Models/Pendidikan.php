<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'tb_pendidikan';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
