<!-- resources/views/alumnos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Editar Alumno</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="id_carrera">Carrera</label>
                        <select name="id" class="form-control" required>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ $alumno->carrera_id == $carrera->id ? 'selected' : '' }}>
                                    {{ $carrera->nombre_carrera }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="{{ $alumno->nombres }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ $alumno->apellidos }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $alumno->direccion }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $alumno->telefono }}" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
