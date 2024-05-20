<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    public function index()
    {
        // Cargar la relación con la tabla escuelas
        $carreras = Carrera::with('escuela')->paginate(7);
        return view('carrera.carrera', compact('carreras'));
    }
}

