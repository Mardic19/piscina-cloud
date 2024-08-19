@extends('layout.plantilla')

@section('titulo', 'EDITAR Periodos')

@section('contenido')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">EDITAR PERIODO</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('periodo.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>

                <div id="mensaje" class="mt-3">
                    @if (session('datos'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('datos') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                <form class="mt-4" method="POST" action="{{ route('periodo.update', $Periodo->idPeriodo) }}">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="idPeriodo" class="form-label">ID PERIODO</label>
                        <input type="text" class="form-control" name="idPeriodo"
                            value="{{ $Periodo->idPeriodo }}" />
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="F_Inicio" class="form-label">Año</label>
                                <input type="date" class="form-control" name="F_Inicio" value="{{ $Periodo->F_Inicio }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modalidad" class="form-label">Ciclo</label>
                                <input type="text" class="form-control" name="Ciclo"
                            value="{{ $Periodo->Ciclo }}" />
                            </div>
                        </div>

                    </div>

                    <!-- Puedes agregar más campos según tus necesidades y utilizar el mismo enfoque -->

                    <button class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection