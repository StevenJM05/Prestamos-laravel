@extends('layouts.app')

@section('content')
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Escuelas</h1>
                <a class="btn btn-success" href="escuelas/create">Agregar</a>
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
                                    <form action="{{ route('escuelas.destroy', $escuela->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                    <a class="btn btn-outline-warning" href="{{route('escuelas.edit', $escuela->id)}}">Actualizar</a>
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
