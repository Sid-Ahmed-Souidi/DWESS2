<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{


    function Prestamo(){
        return $this->belongsTo(Prestamo::class);
    }
}
