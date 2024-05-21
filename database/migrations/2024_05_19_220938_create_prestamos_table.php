<?php

use App\Models\Alumno;
use App\Models\Libro;
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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreignId('libro_id')->references('id')->on('libros')->onDelete('cascade');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->boolean('estado')->default(1); 
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
