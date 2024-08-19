@extends('layout.plantilla')

@section('titulo', 'Programas')

@section('contenido')
    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>LISTA DE PROGRAMAS</h1>
        </center>
        
        <br>
        <a href="{{ route('programa.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
        <nav class="navbar float-right">
            <form class="form-inline my-2" method="GET">
                <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por id"
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($programas as $programa)
                    <tr>
                        <td>{{ $programa->idPrograma }}</td>
                        <td>{{ $programa->nombre }}</td>
                        <td>{{ $programa->descripcion }}</td>
                        <td>{{ $programa->modalidad }}</td>
                        <td>
                            <a href="{{ route('programa.edit', $programa->idPrograma) }}"
                                class="btn btn-info btn-sm">Editar</a>
                            <a href="{{ route('programa.destroy', $programa->idPrograma) }}"
                                class="btn btn-success btn-sm">Eliminar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><b>No hay programas registrados</b></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$programas->appends(['buscarpor' => $buscarpor])->links()}}
    </div>
@endsection