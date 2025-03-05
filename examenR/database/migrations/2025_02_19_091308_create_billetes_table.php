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
        Schema::create('billetes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('servicio_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->time('hora');
            $table->float('precio');
            $table->integer('anulado');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billetes');
    }
};
