<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id',
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    public function libro(){
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
