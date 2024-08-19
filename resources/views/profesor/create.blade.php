@extends('layout.plantilla')

@section('titulo', 'Nuevo Profesor')

@section('contenido')
<div class="container">
    <div class="row d-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Datos Generales</h4>
                    <form class="mt-4" method="POST" action="{{ route('profesor.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">DNI</label>
                            <input type="number" class="form-control @error('dni') is-invalid @enderror"
                                name="dni">

                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">NOMBRES</label>
                            <input type="text" class="form-control @error('NOMBRES') is-invalid @enderror"
                                name="NOMBRES">
                            @error('NOMBRES')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">ESPECIALIDAD</label>
                            <input type="text" class="form-control @error('especialidad') is-invalid @enderror"
                                name="especialidad">
                            @error('especialidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">ID PROFESOR</label>
                            <input type="text" class="form-control @error('idProfesor') is-invalid @enderror"
                                name="idProfesor">
                            @error('idProfesor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">CELULAR</label>
                            <input type="number" class="form-control @error('CELULAR') is-invalid @enderror"
                                name="CELULAR">
                            @error('CELULAR')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">EDAD</label>
                            <input type="number" class="form-control @error('EDAD') is-invalid @enderror"
                                name="EDAD">
                            @error('EDAD')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">CORREO</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                        <a href="{{ route('cancelarProfesor') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('login/images/profesor.jpg') }}" alt="Imagen" class="img-fluid" style="max-width: 100%; max-height: 100%;">
        </div>
    </div>
</div>
@endsection
