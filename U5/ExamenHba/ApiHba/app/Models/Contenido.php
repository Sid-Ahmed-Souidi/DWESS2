<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{

    function Reproducciones_Contenido(){
        return $this->hasMany(Reproduccion::class)->get();
        }


}
