<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    function detalles(){
        return $this->hasMany(DetalleCita::class)->get();
    }
}
