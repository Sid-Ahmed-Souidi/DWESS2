<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     */
    public function up(): void
    {

        ///CUIDADO A LA HORA DE CREAR LAS MIGRACIONES YA QUE 
        //SI PRESTAMOS TIENE CLAVE FORANEA DE LIBROS SE DEBE CREAR ANTES 
        //LIBROS QUE PRESTAMOS POR ESO PUEDO RENOMBRAR LOS NUMEROS PA QUE CAMBIEN DE ORDEN 
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->integer('numEjemplares');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
