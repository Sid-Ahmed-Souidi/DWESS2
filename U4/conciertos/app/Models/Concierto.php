<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{

    function Entradas(){
        return  $this->hasMany(Prestamo::class)->get();
    }

}
