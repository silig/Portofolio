<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'tb_pengalaman';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
