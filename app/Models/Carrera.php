<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'escuela_id', 
        'nombre_carrera',
        'asignaturas',
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }

    public function escuela() 
    {
        return $this->belongsTo(Escuela::class, 'escuela_id');
    }
}

