<!-- resources/views/libros/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

                <h1>Libros</h1>
                <a href="{{ route('libros.create') }}" class="btn btn-outline-success text-white">Agregar Libro</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Formulario de búsqueda -->
                <form action="{{ route('libros.index') }}" method="GET" class="mb-3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por título, autor, editorial o ISBN" value="{{ request('search') }}">
                        </div>
                        <div class="form-group col-md-3 mt-3">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Limpiar Filtros</a>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Fecha de Edición</th>
                            <th>ISBN</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->editorial }}</td>
                                <td>{{ $libro->fecha_edicion }}</td>
                                <td>{{ $libro->ISBN }}</td>
                                <td>
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-outline-warning">Actualizar</a>
                                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $libros->links() }}
            </div>
        </div>
    </div>
@endsection
