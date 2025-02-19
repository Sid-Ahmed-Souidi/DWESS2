<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
    function Conductor(){
        return  $this->belongsTo(Servicio::class);
    }

    function billetes(){
        return  $this->hasMany(Billete::class);
    }


}
