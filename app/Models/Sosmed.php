<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $table = 'tb_sosmed';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
