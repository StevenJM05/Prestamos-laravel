@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white" style="background-color: #683475">
            <h1>Editar Préstamo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="fecha_devolucion">Nueva Fecha de Devolución:</label>
                    <input type="date" name="fecha_devolucion" class="form-control" value="{{ $prestamo->fecha_devolucion }}" required>
                </div>
                <button type="submit" class="btn btn-outline-success mt-3">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
