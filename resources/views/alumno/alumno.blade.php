<!-- resources/views/alumnos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Alumnos</h1>
                <a href="{{ route('alumnos.create') }}" class="btn btn-outline-success text-white">Agregar Alumno</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Carrera</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->carrera->nombre_carrera }}</td>
                                <td>{{ $alumno->nombres }}</td>
                                <td>{{ $alumno->apellidos }}</td>
                                <td>{{ $alumno->direccion }}</td>
                                <td>{{ $alumno->telefono }}</td>
                                <td>
                                    <a href="{{ route('alumnos.edit', $alumno->id_alumno) }}" class="btn btn-outline-warning">Actualizar</a>
                                    <form action="{{ route('alumnos.destroy', $alumno->id_alumno) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $alumnos->links() }} 
    </div>
@endsection
