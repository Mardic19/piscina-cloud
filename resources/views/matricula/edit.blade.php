@extends('layout.plantilla')

@section('titulo', 'Editar Matricula')

@section('contenido')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Matrícula</h4>
                <form class="mt-4" method="POST" action="{{ route('Matricula.update', $matricula->idMatricula) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="idMatricula" class="form-label">ID de Matrícula</label>
                                <input type="text" class="form-control" name="idMatricula" value="{{ $matricula->idMatricula }}" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <label for="codAlumno" class="form-label">ALUMNO</label>
                                <select class="form-control" id="codAlumno" name="codAlumno">
                                    @foreach ($alumnos as $item)
                                        <option value="{{ $item->codAlumno }}" {{ $item->codAlumno == $matricula->codAlumno ? 'selected' : '' }}>{{ $item->persona->Nombres }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="idPrograma" class="form-label">PROGRAMA</label>
                                <select class="form-control" id="idPrograma" name="idPrograma" onchange="actualizarMontoAdeudado()">
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->idPrograma }}" {{ $programa->idPrograma == $matricula->idPrograma ? 'selected' : '' }}>{{ $programa->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="idPeriodo" class="form-label">PERIODO</label>
                                <select class="form-control" id="idPeriodo" name="idPeriodo" onchange="actualizarMontoAdeudado()">
                                    @foreach ($periodos as $periodo)
                                        <option value="{{ $periodo->idPeriodo }}" {{ $periodo->idPeriodo == $matricula->idPeriodo ? 'selected' : '' }}>{{ $periodo->Ciclo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-6">
                                <label for="fechaRegistro" class="form-label">FECHA DE REGISTRO</label>
                                <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" value="{{ $matricula->fechaRegistro }}">
                            </div>
                            <div class="col-6">
                                <label for="fechaRegistro" class="form-label">ESTADO DE LA MATRICULA</label>                       
                                <select class="form-control" id="estadoMatricula" name="estadoMatricula">
                                        <option value="Activa" {{ $matricula->estadoMatricula="Activa" ? 'selected' : '' }}>Activa</option>
                                        <option value="Inactiva" {{ $matricula->estadoMatricula="Inactiva" ? 'selected' : '' }}>Inactiva</option>
                                    </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                    <a href="{{ route('Matricula.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    
@endsection