<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'alumno_id',
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    public function alumnos(){
        return $this->belongsTo(Alumno::class);
    }

    public function libros(){
        return $this->belongsTo(Libro::class);
    }
}
