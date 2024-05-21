<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;

class EscuelaController extends Controller
{
    public function index()
    {
        $escuelas = Escuela::paginate(10);
        return view('escuela.escuela', compact('escuelas'));
    }

    public function create()
    {
        return view('escuela.escuelaAgregar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'director' => 'required|string|max:255',
        ]);

        Escuela::create($request->all());

        return redirect()->route('escuelas.index')->with('success', 'Escuela creada exitosamente');
    }

    public function edit($id)
    {
        $escuela = Escuela::findOrFail($id);
        return view('escuela.escuelaUpdate', compact('escuela'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'director' => 'required|string|max:255',
        ]);

        $escuela = Escuela::findOrFail($id);
        $escuela->update($request->all());

        return redirect()->route('escuelas.index')->with('success', 'Escuela actualizada exitosamente');
    }

    public function destroy($id)
    {
        $escuela = Escuela::findOrFail($id);
        $escuela->delete();

        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente');
    }
}
