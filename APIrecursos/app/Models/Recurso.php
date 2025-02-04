<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    function reservas(){
        return $this->belongsTo(Reserva::class)->get();
    }
}
