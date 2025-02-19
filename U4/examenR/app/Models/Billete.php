<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billete extends Model
{
    function Servicio(){
        return  $this->belongsTo(Servicio::class);
    }


}
