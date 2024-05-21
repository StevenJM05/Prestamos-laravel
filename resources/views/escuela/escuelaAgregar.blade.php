<!-- resources/views/escuelas/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Agregar Escuela</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('escuelas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre de la Escuela</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="director">Director</label>
                        <input type="text" class="form-control" id="director" name="director" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                    <a href="{{ route('escuelas.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
