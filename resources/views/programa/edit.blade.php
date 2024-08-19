@extends('layout.plantilla')

@section('titulo', 'Editar Programa')

@section('contenido')
    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>EDITAR PROGRAMA</h1>
        </center>

        <br>
        <a href="{{ route('programa.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>

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

        <form class="mt-4" method="POST" action="{{ route('programa.update', $programa->idPrograma) }}">
            @method('put')
            @csrf

            <div class="form-group">
                <label for="idPrograma" class="form-label">ID del Programa</label>
                <input type="text" class="form-control @error('idPrograma') is-invalid @enderror" name="idPrograma"
                    value="{{ $programa->idPrograma }}" readonly />
                @error('idPrograma')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                    value="{{ $programa->nombre }}" />
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                    value="{{ $programa->descripcion }}" />
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="modalidad" class="form-label">Modalidad</label>
                <select class="form-control @error('modalidad') is-invalid @enderror" name="modalidad">
                    <option value="Intensivo" {{ $programa->modalidad == 'Intensivo' ? 'selected' : '' }}>Intensivo</option>
                    <option value="Regular" {{ $programa->modalidad == 'Regular' ? 'selected' : '' }}>Regular</option>
                </select>
                @error('modalidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary"><i class="fas fa-save"></i> Guardar Cambios</button>
        </form>
    </div>
@endsection