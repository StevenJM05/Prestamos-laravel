@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Préstamos</h1>
                <button class="btn btn-outline-success text-white">Agregar</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Alumno</th>
                            <th>Nombre del Libro</th>
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
                                <td>{{ $prestamo->estado }}</td>
                                <td>
                                    <button class="btn btn-outline-danger">Eliminar</button>
                                    <button class="btn btn-outline-warning">Actualizar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $prestamos->links() }}
    </div>
@endsection
