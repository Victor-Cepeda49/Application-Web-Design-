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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asignatura_id');
            $table->enum('tipo', ['Tarea', 'Actividad', 'Prueba rapida', 'Examen parcial', 'Evidencia', 'Examen final']);
            $table->string('nombre');
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->date('fecha');
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
