<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'tb_hobi';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
