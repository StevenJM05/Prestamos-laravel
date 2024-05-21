<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Log;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::paginate(10);
        return view('libro.libro', compact('libros'));
    }

    public function create()
    {
        return view('libro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'fecha_edicion' => 'required|date',
            'ISBN' => 'required|string|max:100',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libro.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'fecha_edicion' => 'required|date',
            'ISBN' => 'required|string|max:100',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    Log::info('Buscar libros con query: ' . $query); // Añadir este log

    $libros = Libro::where('titulo', 'LIKE', "%{$query}%")
                   ->paginate(10);

    Log::info('Resultados de libros: ' . $libros); // Añadir este log

    return response()->json($libros);
}

}

