<!-- resources/views/carreras/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Actualizar Carrera</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_escuela">Escuela</label>
                        <select class="form-control" id="id_escuela" name="escuela_id" required>
                            @foreach ($escuelas as $escuela)
                                <option value="{{ $escuela->id }}" {{ $carrera->id == $escuela->escuela_id ? 'selected' : '' }}>
                                    {{ $escuela->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre_carrera">Nombre de la Carrera</label>
                        <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" value="{{ $carrera->nombre_carrera }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="asignaturas">Asignaturas</label>
                        <input type="number" class="form-control" id="asignaturas" name="asignaturas" value="{{ $carrera->asignaturas }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                    <a href="{{ route('carreras.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
