<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    

    function reservas(){
        return $this->hasMany(Reserva::class)->get();
        }
}
