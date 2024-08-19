@extends('layout.plantilla')

@section('titulo', 'Periodos')

@section('contenido')
    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>LISTA DE PERIODOS</h1>
        </center>
        
        <br>
        <a href="{{ route('periodo.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                    <th scope="col">AÑO</th>
                    <th scope="col">CICLO</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Periodo as $periodo)
                    <tr>
                        <td>{{ $periodo->idPeriodo }}</td>
                        <td>{{ $periodo->F_Inicio }}</td>
                        <td>{{ $periodo->Ciclo }}</td>
                        <td>
                            <a href="{{ route('periodo.edit', $periodo->idPeriodo) }}"
                                class="btn btn-info btn-sm">Editar</a>
                            <a href="{{ route('periodo.destroy', $periodo->idPeriodo) }}"
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