<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCita extends Model
{

    public $timestamps = false; // Desactiva created_at y updated_at

    function Cita(){
        return  $this->belongsTo(Cita::class);
    }

    function Servicio(){
        return  $this->belongsTo(Servicio::class);
    }
}
