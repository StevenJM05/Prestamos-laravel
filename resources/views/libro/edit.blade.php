<!-- resources/views/libros/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Actualizar Libro</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ $libro->autor }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="editorial">Editorial</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" value="{{ $libro->editorial }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="fecha_edicion">Fecha de Edición</label>
                        <input type="date" class="form-control" id="fecha_edicion" name="fecha_edicion" value="{{ $libro->fecha_edicion }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="ISBN">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $libro->ISBN }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                    <a href="{{ route('libros.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
