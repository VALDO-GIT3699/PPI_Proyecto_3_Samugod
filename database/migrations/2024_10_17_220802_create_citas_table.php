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
        Schema::create('citas', function (Blueprint $table) {
            $table->id(); // ID auto incremental
            $table->unsignedBigInteger('usuario_id'); // Referencia al usuario (puedes ajustarlo según tu modelo)
            $table->string('email', 255);
            $table->string('nombre', 100);
            $table->string('apellidoma',100);
            $table->string('apellidopa',100);
            $table->string('telefono', 15);
            $table->date('fecha'); // Fecha de la cita
            $table->time('hora'); // Hora de la cita
            $table->string('descripcion');  // Descripción de la cita
            $table->string('consultorio');
            $table->string('doctor');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente'); // Estado de la cita
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
