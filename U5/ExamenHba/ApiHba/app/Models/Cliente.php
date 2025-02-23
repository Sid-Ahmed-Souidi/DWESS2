<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    function Reproducciones_Cliente(){
        return $this->hasMany(Reproduccion::class)->get();
        }
}
