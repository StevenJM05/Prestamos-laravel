<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Log;
use App\Models\Carrera;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('carrera')->paginate(10);
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
            'carrera_id' => 'required|exists:carreras,carrera_id',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente');
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
            'id' => 'required|exists:carreras,id',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        
        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        Log::info('Buscar alumnos con query: ' . $query); 

        $alumnos = Alumno::where('nombres', 'LIKE', "%{$query}%")
                        ->orWhere('apellidos', 'LIKE', "%{$query}%")
                        ->paginate(10);

        Log::info('Resultados de alumnos: ' . $alumnos); 

        return response()->json($alumnos);
    }
}
