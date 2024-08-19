
@extends('layout.plantilla')

@section('titulo', 'Alumnos')

@section('contenido')

<div class="container">
    <br>
    <br>
    <br>

    <center>
        <h1>VISTA ALUMNOS</h1>
    </center>
    <br>

    <a href="{{ route('alumno.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2" method="GET">
            <input class="form-control me-2" placeholder="Buscar dni" name="busqueda" type="search"
                aria-label="Search" value="{{$busqueda}}">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </nav>

    <div id="mensaje">
        @if (session('datos'))
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <table class="table">
        <br>

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRES</th>
                <th scope="col">CELULAR</th>
                <th scope="col">EDAD</th>
                <th scope="col">CORREO</th>
                <th scope="col">NIVEL</th>
                <th scope="col">CONDICIÓN MÉDICA</th>
                <th scope="col">ACCION</th>
            </tr>
        </thead>

        <tbody>

            @if (count($alumno) <= 0)
            <tr>
                <td colspan="3"><b>No hay registros</b></td>
            </tr>
            @else
            @foreach($alumno as $itemAlumno)
            <tr>
                <td>{{ $itemAlumno->codAlumno }}</td>
                <td>{{ $itemAlumno->persona->DNI }}</td>
                <td>{{ $itemAlumno->persona->Nombres }}</td>
                <td>{{ $itemAlumno->persona->Celular }}</td>
                <td>{{ $itemAlumno->persona->Edad }}</td>
                <td>{{ $itemAlumno->persona->email }}</td>
                <td>{{ $itemAlumno->Nivel }}</td>
                <td>{{ $itemAlumno->condicionMedica }}</td>
                <td>
                    <a href="{{ route('alumno.edit', $itemAlumno->codAlumno) }}"
                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <form action="{{ route('alumno.destroy', $itemAlumno->codAlumno) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>

    </table>
    {{$alumno->links()}}
    <div class="col-xl-12 text-center">
        <a href="{{ route('download-pdf') }}" class="btn btn-success btn-sm">Descargar PDF</a>
    </div>
</div>

@endsection

@section('script')
<script>
    setTimeout(function () {
        document.querySelector('#mensaje').remove();
    }, 2000);
</script>
@endsection


