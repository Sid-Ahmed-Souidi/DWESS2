<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    function detalles(){
        return $this->hasMany(DetalleCita::class)->get();
    }
}
