<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Escuela;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::with('escuela')->paginate(10);
        return view('carrera.carrera', compact('carreras'));
    }

    public function create()
    {
        $escuelas = Escuela::all();
        return view('carrera.create', compact('escuelas'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'escuela_id' => 'required|exists:escuelas,id',
            'nombre_carrera' => 'required',
            'asignaturas' => 'required|integer',
        ]);
        
        Carrera::create($request->all());

        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente');
    }

    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        $escuelas = Escuela::all();
        return view('carrera.edit', compact('carrera', 'escuelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'escuela_id' => 'required|exists:escuelas,escuela_id',
            'nombre_carrera' => 'required',
            'asignaturas' => 'required|integer',
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente');
    }

    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente');
    }
}


