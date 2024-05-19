<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public function alumnos(){
        return $this->belongsTo(Alumno::class);
    }

    public function libros(){
        return $this->belongsTo(Alumno::class);
    }
}
