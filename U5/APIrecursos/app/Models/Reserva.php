<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    function recursos(){
        return $this->hasMany(Recurso::class)->get();
    }}
