<!-- resources/views/prestamos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white" style="background-color: #683475">
            <h1>Préstamos</h1>
            <a href="{{ route('prestamos.create') }}" class="btn btn-outline-success text-white">Agregar Préstamo</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Libro</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr>
                            <td>{{ $prestamo->id }}</td>
                            <td>{{ $prestamo->alumno->nombres }} {{ $prestamo->alumno->apellidos }}</td>
                            <td>{{ $prestamo->libro->titulo }}</td>
                            <td>{{ $prestamo->fecha_prestamo }}</td>
                            <td>{{ $prestamo->fecha_devolucion }}</td>
                            <td>{{ $prestamo->estado ? 'Activo' : 'Finalizado' }}</td>
                            <td>
                                <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-outline-warning">Actualizar</a>
                                <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $prestamos->links() }}
        </div>
    </div>
</div>
@endsection
