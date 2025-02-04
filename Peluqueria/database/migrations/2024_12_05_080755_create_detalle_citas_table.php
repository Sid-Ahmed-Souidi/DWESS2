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
        Schema::create('detalle_citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // constrained define que la esta columna es una clave forenea con la tabla citas 
            $table->foreignId('cita_id')->constrained()
            // onUpdate('cascade') si el id relacionado en la table citas cambia , este cambio se reflejara
            //automaticamente en la columna cita_id
            ->onUpdate('cascade')
            //  Si se elimina un registro en la tabla citas,
            //   los registros relacionados en detalle_citas también se eliminarán.
            ->onDelete('cascade');
            $table->foreignId('servicio_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('precio');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_citas');
    }
};
