<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function carreras()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
