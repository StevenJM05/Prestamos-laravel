<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'carrera_id',
        'nombres',
        'apellidos',
        'direccion',
        'telefono'
    ];
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id'); 
    }

    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
