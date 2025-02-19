<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
        public $timestamps = false; // Desactiva created_at y updated_at
        function DetalleCita(){
            return  $this->hasMany(DetalleCita::class)->get();

        }

}
