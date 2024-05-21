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
            <!-- Formulario de búsqueda por estado -->
            <form action="{{ route('prestamo.index') }}" method="GET" class="mb-3">
                <div class="form-group">
                    <label for="estado">Filtrar por Estado:</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="">Mostrar Todos</option>
                        <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="finalizado" {{ request('estado') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Buscar</button>
            </form>
            
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
                                <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-outline-warning">Cambiar fecha devolución</a>
                                <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                                <form action="{{route('prestamos.estado', $prestamo->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-success">{{ $prestamo->estado ? 'Finalizar' : 'Activar' }}</button>
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
