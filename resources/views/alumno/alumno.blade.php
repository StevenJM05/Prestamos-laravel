<!-- resources/views/alumnos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #683475">
                <h1>Alumnos</h1>
                <a href="{{ route('alumnos.create') }}" class="btn btn-outline-success text-white">Agregar Alumno</a>
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar alumno...">
                </div>        
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
                            <th>Carrera</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->carrera->nombre_carrera }}</td>
                                <td><a href="{{ route('alumnos.prestamos', $alumno->id) }}">{{ $alumno->nombres }}</a></td>
                                <td>{{ $alumno->apellidos }}</td>
                                <td>{{ $alumno->direccion }}</td>
                                <td>{{ $alumno->telefono }}</td>
                                <td>
                                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-outline-warning">Actualizar</a>
                                    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $alumnos->links() }} 
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('search-students') }}",
                method: 'GET',
                data: {
                    q: query
                },
                success: function(response) {
                    console.log(response)
                    var tableBody = $('tbody');
                    tableBody.empty();

                    $.each(response.data, function(index, alumno) {
                        var row = $('<tr>').append(
                            $('<td>').text(alumno.id),
                            $('<td>').text(alumno.carrera.nombre_carrera),
                            $('<td>').html('<a href="/alumnos/' + alumno.id + '/prestamos">' + alumno.nombres + '</a>'),
                            $('<td>').text(alumno.apellidos),
                            $('<td>').text(alumno.direccion),
                            $('<td>').text(alumno.telefono),
                            $('<td>').append(
                                $('<a>').attr('href', '/alumnos/' + alumno.id + '/edit').addClass('btn btn-outline-warning').text('Actualizar'),
                                $('<form>').attr('action', '/alumnos/' + alumno.id).attr('method', 'POST').css('display', 'inline').append(
                                    $('<input>').attr('type', 'hidden').attr('name', '_token').val('{{ csrf_token() }}'),
                                    $('<input>').attr('type', 'hidden').attr('name', '_method').val('DELETE'),
                                    $('<button>').attr('type', 'submit').addClass('btn btn-outline-danger').text('Eliminar')
                                )
                            )
                        );
                        tableBody.append(row);
                    });
                }
            });
        });
    });
</script>

@endsection

