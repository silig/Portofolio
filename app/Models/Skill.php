<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'tb_skill';
    protected $guarded = [];
    
    public function profil()
    {
        return $this->belongsTo('App\Models\profil');
    } 
}
