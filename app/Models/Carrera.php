<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }

    public function escuelas()
    {
        return $this->belongsTo(Escuela::class);
    }
}
