@extends('layout.plantilla')

@section('titulo', 'Periodos')

@section('contenido')
    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>PROGRAMAS</h1>
        </center>
        
        <br>
        <a href="{{ route('periodo_programa.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                    <th scope="col">Ciclo</th>
                    <th scope="col">Programa</th>
                    <th scope="col">costo</th>
                    <th scope="col">inicio</th>
                    <th scope="col">termino</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($PeriPrograma as $programa)
                    <tr>
                        <td>{{ $programa->periodo->Ciclo }}</td>
                        <td>{{ $programa->programa->nombre }}</td>
                        <td>{{ $programa->costo }}</td>
                        <td>{{ $programa->inicio }}</td>
                        <td>{{ $programa->termino }}</td>
                        <td>
                            <a href="{{ route('periodo_programa.edit', $programa->idPeriodo,$programa->idPrograma) }}"
                                class="btn btn-info btn-sm">Editar</a>
                            <a href="{{ route('periodo_programa.destroy', $programa->idPeriodo,$programa->idPrograma) }}"
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
    
    </div>
@endsection