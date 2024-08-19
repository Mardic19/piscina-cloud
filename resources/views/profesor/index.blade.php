@extends('layout.plantilla')

@section('titulo', 'Profesores')


@section('contenido')


    <div class="container">
        <br>
        <br>
        <br>

        <center>
            <h1>VISTA DOCENTES</h1>
        </center>
        <br>
        <a href="{{ route('Profesor.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
        <nav class="navbar float-right">
            <form class="form-inline my-2" method="GET">
                <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por codigo"
                    aria-label="Search" value="{{ $buscarpor }}">
                <button class="btn btn-success" type="sumbit">Buscar</button>
            </form>

        </nav>
        <div id="mensaje">
            @if (session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>


                @if (count($Profesor) <= 0)
                    <tr>
                        <td colspan="3"><b>No hay registros</b></td>
                    </tr>
                @else
                    @foreach ($Profesor as $itemProfesor)
                        <tr>
                            <td>{{ $itemProfesor->idProfesor }}</td>
                            <td>{{ $itemProfesor->DNI }}</td>
                            <td>{{ $itemProfesor->persona->Nombres }}</td>
                            <td>{{ $itemProfesor->persona->Celular }}</td>
                            <td>{{ $itemProfesor->persona->Edad }}</td>
                            <td>{{ $itemProfesor->persona->email }}</td>
                            <td>{{ $itemProfesor->especialidad }}</td>
                            <td><a href="{{ route('Profesor.edit', $itemProfesor->idProfesor) }}"
                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                    <form action="{{ route('Profesor.destroy', $itemProfesor->idProfesor) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i>Eliminar </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$Profesor->links()}}
    </div>
@endsection


@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
