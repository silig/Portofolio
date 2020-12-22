<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'tb_prestasi';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
