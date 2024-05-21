<!-- resources/views/libros/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Agregar Libro</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('libros.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="editorial">Editorial</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="fecha_edicion">Fecha de Edición</label>
                        <input type="date" class="form-control" id="fecha_edicion" name="fecha_edicion" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="ISBN">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                    <a href="{{ route('libros.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
