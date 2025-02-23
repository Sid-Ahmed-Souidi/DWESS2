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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('viaje_id')->constrained()
            ->onUpdate('cascade')->onDelete('cascade');            
            $table->date('fechaS');
            $table->string('nombreCliente');
            $table->integer('numPersonas');
            $table->float('precioTotal');
            $table->integer('anulada');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
