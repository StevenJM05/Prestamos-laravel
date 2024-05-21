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
                <div class="form-group position-relative">
                    <label for="alumno-search">Buscar Alumno:</label>
                    <input type="text" id="alumno-search" class="form-control" placeholder="Escriba para buscar...">
                    <input type="hidden" name="alumno_id" id="alumno_id">
                    <div id="alumno-results" class="search-results"></div>
                </div>
                <div class="form-group position-relative">
                    <label for="libro-search">Buscar Libro:</label>
                    <input type="text" id="libro-search" class="form-control" placeholder="Escriba para buscar...">
                    <input type="hidden" name="libro_id" id="libro_id">
                    <div id="libro-results" class="search-results"></div>
                </div>
               
                <button type="submit" class="btn btn-outline-success mt-3">Guardar Préstamo</button>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function search(query, endpoint, resultsContainer, inputId) {
        if (query.length < 1) {
            $(resultsContainer).empty();
            return;
        }

        $.ajax({
            url: endpoint,
            method: 'GET',
            data: { q: query },
            success: function(response) {
                let results = response.data;
                $(resultsContainer).empty();
                if (results.length > 0) {
                    results.forEach(item => {
                        let displayText = endpoint.includes('search-students') 
                                          ? `${item.nombres} ${item.apellidos}` 
                                          : item.titulo;
                        $(resultsContainer).append('<div class="search-result-item" data-id="' + item.id + '">' + displayText + '</div>');
                    });
                } else {
                    $(resultsContainer).append('<div class="search-result-item">No se encontraron resultados</div>');
                }
            }
        });
    }

    $('#alumno-search').on('input', function() {
        let query = $(this).val();
        search(query, '{{ route("search-students") }}', '#alumno-results', '#alumno_id');
    });

    $('#libro-search').on('input', function() {
        let query = $(this).val();
        search(query, '{{ route("search-books") }}', '#libro-results', '#libro_id');
    });

    $('#alumno-results').on('click', '.search-result-item', function() {
        let id = $(this).data('id');
        let name = $(this).text();
        $('#alumno-search').val(name);
        $('#alumno_id').val(id);
        $('#alumno-results').empty();
    });

    $('#libro-results').on('click', '.search-result-item', function() {
        let id = $(this).data('id');
        let name = $(this).text();
        $('#libro-search').val(name);
        $('#libro_id').val(id);
        $('#libro-results').empty();
    });
});
</script>
@endsection
