<!-- resources/views/alumnos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Agregar Alumno</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('alumnos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_carrera">Carrera</label>
                        <select name="id_carrera" class="form-control" required>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre_carrera }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Agregar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
