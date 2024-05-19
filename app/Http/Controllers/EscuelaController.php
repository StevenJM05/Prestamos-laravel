<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;

class EscuelaController extends Controller
{
    public function index()
    {
        $escuelas = Escuela::paginate(7); 
        return view('escuela.escuela', compact('escuelas'));
    }
    public function create()
    {
        return view('escuela.escuelaAgregar');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'director' => 'required'
        ]);

        Escuela::create([
            'nombre' => $request->nombre,
            'director' => $request->director,
        ]);

        return redirect()->route('escuelas.index')->with('success', 'Escuela agregada correctamente.');
    }
}
