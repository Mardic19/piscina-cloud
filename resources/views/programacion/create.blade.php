@extends('layout.plantilla')

@section('titulo', 'Programacion Clase')

@section('contenido')

    <link href="{{ asset('plantilla/dist/css/programacionStyle.css') }}" rel="stylesheet">
    <div class="container">
        <br><br><br>
        <center>
            <h1><strong>ACTIVAR PROGRAMAS</strong></h1>
        </center>
        <br><br>

        <form class="mt-4" method="POST" action="{{ route('periodo_programa.store') }}">
            @csrf
            <div class="form-group">
                <div class="row">                      
                    <div class="col-4">
                        <label for="idPrograma" class="form-label">PROGRAMA</label>
                        <select class="form-control" id="idPrograma" name="idPrograma">
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->idPrograma }}">{{ $programa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="idPeriodo" class="form-label">PERIODO</label>
                        <select class="form-control" id="idPeriodo" name="idPeriodo">
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->idPeriodo }}">{{ $periodo->Ciclo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <label for="fechaRegistro" class="form-label">FECHA DE INICIO</label>
                        <input type="date" class="form-control" id="inicio" name="inicio">
                    </div>
                    <div class="col-6">
                        <label for="fechaRegistro" class="form-label">FECHA DE TERMINO</label>
                        <input type="date" class="form-control" id="termino" name="termino">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="fechaRegistro" class="form-label">PRECIO MENSUAL DEL PROGRAMA</label>
                        <input type="text" class="form-control" id="costo" name="costo">
                    </div>
                </div>
                <br>
            </div>
            <button class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('cancelarP') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>




    </div>



@endsection
