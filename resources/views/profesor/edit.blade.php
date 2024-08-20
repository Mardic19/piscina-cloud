@extends('layout.plantilla')

@section('titulo', 'Editar datos del Profesor')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{ asset('login/images/profesor.jpg') }}" alt="Imagen" class="img-fluid"
                style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-6">
            <h1 class="text-center">Editar datos del Profesor</h1>
            <form class="mt-4" method="POST" action="{{ route('profesor.update', $Profesor->idProfesor) }}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="idProfesor" class="form-label">idProfesor</label>
                    <input type="text" class="form-control @error('idProfesor') is-invalid @enderror"
                        name="idProfesor" value="{{ $Profesor->idProfesor }}"/>
                </div>

                @error('idProfesor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <div class="form-group">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                        value="{{ $Profesor->DNI }}">
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="especialidad" class="form-label">especialidad</label>
                    <input class="form-control @error('especialidad') is-invalid @enderror" type="text"
                        placeholder="" id="especialidad" name="especialidad" value="{{ $Profesor->especialidad }}" />
                    @error('especialidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="NOMBRES" class="form-label">NOMBRES</label>
                    <input class="form-control @error('NOMBRES') is-invalid @enderror" type="text"
                        placeholder="" id="NOMBRES" name="NOMBRES" value="{{ $Profesor->persona->Nombres }}" />
                    @error('NOMBRES')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="CELULAR" class="form-label">CELULAR</label>
                    <input type="text" class="form-control @error('CELULAR') is-invalid @enderror"
                        name="CELULAR" value="{{ $Profesor->persona->Celular }}">
                    @error('CELULAR')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="EDAD" class="form-label">EDAD</label>
                    <input type="text" class="form-control @error('EDAD') is-invalid @enderror" name="EDAD"
                        value="{{ $Profesor->persona->Edad }}">
                    @error('EDAD')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Correo" class="form-label">CORREO</label>
                    <input type="text" class="form-control @error('Correo') is-invalid @enderror" name="Correo"
                        value="{{ $Profesor->persona->Correo}}">
                    @error('Correo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

                <button class="btn btn-primary"><i class="fas fa-save"></i>Actualizar</button>
                <a href="{{ route('cancelarProfesor') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection