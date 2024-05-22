<!-- resources/views/carreras/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Carreras</h1>
                <a href="{{ route('carreras.create') }}" class="btn btn-outline-success text-white">Agregar Carrera</a>
                @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Escuela</th>
                            <th>Nombre de la Carrera</th>
                            <th>Asignaturas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->id }}</td>
                                <td>{{ $carrera->escuela->nombre }}</td>
                                <td>{{ $carrera->nombre_carrera }}</td>
                                <td>{{ $carrera->asignaturas }}</td>
                                <td>
                                    <a href="{{ route('carreras.edit', $carrera->id) }}" class="btn btn-outline-warning">Actualizar</a>
                                    <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" style="display:inline;">
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
        {{ $carreras->links() }} 
    </div>
@endsection
