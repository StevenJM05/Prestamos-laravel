<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Alumno;
use App\Models\Libro;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['alumno', 'libro'])->paginate(10);
        return view('prestamo.prestamo', compact('prestamos'));
    }
    public function create()
    {
        return view('prestamo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|boolean',
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado exitosamente');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamo.edit', compact('prestamo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|boolean',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente');
    }
}

