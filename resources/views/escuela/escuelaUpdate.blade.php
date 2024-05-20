@extends('layouts.app')

@section('content')
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Actualizar Escuela</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('escuelas.store') }}">
                    @csrf 
                    <div class="mb-3">
                        <label for="nombre" class="form-label" >Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value='{{ $escuela->nombre }}' required>
                    </div>

                    <div class="mb-3">
                        <label for="director" class="form-label">Director:</label>
                        <input type="text" class="form-control" id="director" name="director" value='{{ $escuela->director }}' required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

@endsection