<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $fillable=[
        'nombre',
        'director'

    ];
    public function carreras(){
        return $this->hasMany(Carrera::class);
    }

}
