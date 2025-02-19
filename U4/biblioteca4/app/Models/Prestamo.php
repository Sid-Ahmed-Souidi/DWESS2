<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    //un libro tiene asociado un solo prestamo
    use HasFactory;
    function libro(){
        return  $this->belongsTo(Libro::class);
    }

}
