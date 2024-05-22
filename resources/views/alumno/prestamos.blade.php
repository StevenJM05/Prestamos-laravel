@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Prestamos de {{ $alumno->nombres }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libro</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion }}</td>
                        <td>{{ $prestamo->estado ? 'Activo' : 'Finalizado' }}</td>
                        <td>
                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-outline-warning">Cambiar fecha devolución</a>
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                            <form action="{{ route('prestamos.estado', $prestamo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-success">{{ $prestamo->estado ? 'Finalizar' : 'Activar' }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay préstamos registrados para este alumno</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($prestamos->isEmpty())
            <div class="alert alert-info" role="alert">
                No se encontraron préstamos para este alumno.
            </div>
        @else
            {{ $prestamos->links() }}
        @endif
    </div>
@endsection
