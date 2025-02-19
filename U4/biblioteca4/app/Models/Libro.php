<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
        //un libro tiene varios prestamos asociados
        use HasFactory;
        function prestamos(){
            return  $this->hasMany(Prestamo::class)->get();
        }
    
}
