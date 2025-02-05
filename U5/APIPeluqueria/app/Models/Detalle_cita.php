<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_cita extends Model
{
    function citas(){
        return $this->belongsTo(Cita::class)->get();
        }
       
        function servicios(){
            return $this->belongsTo(Servicio::class);
        }
}
