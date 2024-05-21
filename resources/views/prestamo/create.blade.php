@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white" style="background-color: #683475">
            <h1>Agregar Préstamo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('prestamos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="alumno-search">Buscar Alumno:</label>
                    <input type="text" id="alumno-search" class="form-control" placeholder="Escriba para buscar...">
                    <input type="hidden" name="alumno_id" id="alumno_id">
                    <div id="alumno-results" class="search-results"></div>
                </div>
                <div class="form-group">
                    <label for="libro-search">Buscar Libro:</label>
                    <input type="text" id="libro-search" class="form-control" placeholder="Escriba para buscar...">
                    <input type="hidden" name="libro_id" id="libro_id">
                    <div id="libro-results" class="search-results"></div>
                </div>
                <div class="form-group">
                    <label for="fecha_prestamo">Fecha de Préstamo:</label>
                    <input type="date" name="fecha_prestamo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_devolucion">Fecha de Devolución:</label>
                    <input type="date" name="fecha_devolucion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="1">Prestado</option>
                        <option value="0">Devuelto</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-success mt-3">Guardar Préstamo</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#alumno-search').on('keyup', function() {
        var query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: "{{ route('alumnos.search') }}",
                type: "GET",
                data: {'query': query},
                success: function(data) {
                    $('#alumno-results').empty();
                    data.data.forEach(function(alumno) {
                        $('#alumno-results').append('<div class="search-result" data-id="' + alumno.id + '">' + alumno.nombres + ' ' + alumno.apellidos + '</div>');
                    });
                }
            });
        }
    });

    $(document).on('click', '.search-result', function() {
        var id = $(this).data('id');
        var name = $(this).text();
        $('#alumno_id').val(id);
        $('#alumno-search').val(name);
        $('#alumno-results').empty();
    });

    $('#libro-search').on('keyup', function() {
        var query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: "{{ route('libros.search') }}",
                type: "GET",
                data: {'query': query},
                success: function(data) {
                    $('#libro-results').empty();
                    data.data.forEach(function(libro) {
                        $('#libro-results').append('<div class="search-result" data-id="' + libro.id + '">' + libro.titulo + '</div>');
                    });
                }
            });
        }
    });

    $(document).on('click', '.search-result', function() {
        var id = $(this).data('id');
        var title = $(this).text();
        $('#libro_id').val(id);
        $('#libro-search').val(title);
        $('#libro-results').empty();
    });
});
</script>
@endsection
