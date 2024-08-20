
@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <div class="row d-flex">
        <div class="col-md-6 text-center" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('login/images/alumno.jpg') }}" alt="Imagen" class="img-fluid"
                style="max-width: 100%; max-height: 100%;">
        </div>
        <div class="col-md-6">
            <center>
                <h1>VISTA ACTUALIZAR ALUMNOS</h1>
            </center>

            <form method="POST" action="{{ route('alumno.update', $alumno->codAlumno) }}">
                @method('put')
                <div class="mb-3">
                    @csrf

                    <div class="form-group">
                        <label for=""> Código de Alumno</label>
                        <input type="text" class="" id="codAlumno" name="codAlumno" value="{{ $alumno->codAlumno }}"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for=""> Apellidos y Nombres :</label>
                        <input type="text" class="form-control @error('Nombres') is-invalid @enderror"
                            value="{{ $alumno->persona->Nombres }}" id="Nombres" name="Nombres">

                        @error('Nombres')
                            <span class="invelid-feeback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Agregando campos de Persona -->
                    <div class="form-group">
                        <label for=""> DNI:</label>
                        <input class="form-control @error('dni') is-invalid @enderror" type="text" name="dni"
                            value="{{ $alumno->persona->DNI }}"  readonly>
                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> NUMERO CELULAR:</label>
                        <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular"
                            value="{{ $alumno->persona->Celular }}" name="celular">
                        @error('celular')
                            <span class="invelid-feeback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> EDAD:</label>
                        <input type="text" class="form-control @error('edad') is-invalid @enderror" id="edad"
                            name="edad" value="{{ $alumno->persona->Edad }}">
                        @error('edad')
                            <span class="invelid-feeback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> CORREO:</label>
                        <input type="email" class="form-control @error('Correo') is-invalid @enderror" id="Correo"
                            name="Correo" value="{{ $alumno->persona->Correo }}">
                        @error('Correo')
                            <span class="invelid-feeback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Agregando campos específicos de Alumno -->
                    <div class="form-group">
                        <label for=""> Nivel:</label>
                        <input type="text" class="form-control" name="nivel" value="{{ $alumno->Nivel}}">
                    </div>

                    <div class="form-group">
                        <label for=""> Condición Médica:</label>
                        <input type="text" class="form-control" name="condicionMedica"
                            value="{{ $alumno->condicionMedica}}">
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('cancelarAlumno') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

