<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::paginate(10);
        return view('alumno.alumno', compact('alumnos'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('alumno.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_carrera' => 'required|exists:carreras,id_carrera',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumno.alumno')->with('success', 'Alumno creado exitosamente');
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $carreras = Carrera::all();
        return view('alumno.edit', compact('alumno', 'carreras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id_carrera',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return redirect()->route('alumno.alumno')->with('success', 'Alumno actualizado exitosamente');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumno.alumno')->with('success', 'Alumno eliminado exitosamente');
    }
}
