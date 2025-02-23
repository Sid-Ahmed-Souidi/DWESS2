<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    
    function viaje(){
        return $this->belongsTo(Viaje::class);
        }

}
