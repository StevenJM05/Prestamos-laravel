<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestamo::query();

        if ($request->has('estado')) {
            $estado = $request->estado;
            if ($estado == 'activo') {
                $query->where('estado', 1);
            } elseif ($estado == 'finalizado') {
                $query->where('estado', 0);
            }
        }

        if ($request->has('fecha_devolucion') && !empty($request->fecha_devolucion)) {
            $query->whereDate('fecha_devolucion', $request->fecha_devolucion);
        }
        $prestamos = $query->with(['alumno', 'libro'])->paginate(10);
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

        ]);

        // Obtener la fecha actual
        $fecha_prestamo = Carbon::now();

        // Calcular la fecha de devolución con 3 días hábiles
        $fecha_devolucion = Carbon::now()->addWeekdays(3);

        // Crear el préstamo con los datos validados y las fechas calculadas
        $prestamo = new Prestamo();
        $prestamo->alumno_id = $request->alumno_id;
        $prestamo->libro_id = $request->libro_id;
        $prestamo->fecha_prestamo = $fecha_prestamo;
        $prestamo->fecha_devolucion = $fecha_devolucion;
        $prestamo->estado = 1;
        $prestamo->save();

        return redirect()->route('prestamo.index')->with('success', 'Préstamo creado exitosamente');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamo.edit', compact('prestamo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_devolucion' => 'required|date',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->fecha_devolucion = $request->fecha_devolucion;
        $prestamo->save();

        return redirect()->route('prestamo.index')->with('success', 'Fecha de devolución actualizada exitosamente');
    }

    

    public function estado($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        if ($prestamo->estado == 0) {
            $prestamo->estado = 1;
        } else {
            $prestamo->estado = 0;
        }

        $prestamo->save();

        return redirect()->route('prestamo.index')->with('success', 'Estado actualizado exitosamente');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();
        return redirect()->route('prestamo.index')->with('success', 'Prestamo eliminado exitosamente');
    }
}
