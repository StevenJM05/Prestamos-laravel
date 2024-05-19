@extends('layouts.app')

@section('content')
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Escuelas</h1>
                <a class="btn btn-success" href="escuelas/create">Agregar</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Director</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($escuelas as $escuela)
                            <tr>
                                <td>{{ $escuela->id }}</td>
                                <td>{{ $escuela->nombre }}</td>
                                <td>{{ $escuela->director }}</td>
                                <td>
                                    <button class="btn btn-outline-danger">Eliminar</button>
                                    <button class="btn btn-outline-warning">Actualizar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                    {{ $escuelas->links() }} 
            </div>
        </div>
    </div>
@endsection
