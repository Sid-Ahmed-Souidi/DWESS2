<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
                        // onUpdate('cascade') si el id relacionado en la table citas cambia , este cambio se reflejara
            //automaticamente en la columna cita_id
            $table->foreignId('libro_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            //  Si se elimina un registro en la tabla citas,
            //   los registros relacionados en detalle_citas también se eliminarán.
            $table->string('nombreCliente');
            $table->date('fechaDevolucion')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
