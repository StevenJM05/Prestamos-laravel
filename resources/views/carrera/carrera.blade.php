@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Carreras</h1>
                <button class="btn btn-outline-success text-white">Agregar</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la Carrera</th>
                            <th>Nombre de la Escuela</th>
                            <th>Asignaturas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->id }}</td>
                                <td>{{ $carrera->nombre_carrera }}</td>
                                <td>{{ $carrera->escuela->nombre ?? 'N/A' }}</td>
                                <td>{{ $carrera->asignaturas }}</td>
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
        {{ $carreras->links() }}
    </div>
@endsection
