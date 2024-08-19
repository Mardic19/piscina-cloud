@extends('layout.plantilla')

@section('titulo', 'Crear Programa')

@section('contenido')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">CREAR PROGRAMA</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('programa.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>

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

                <form class="mt-4" method="POST" action="{{ route('programa.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre del Programa</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ old('nombre') }}" />
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    name="descripcion" value="{{ old('descripcion') }}" />
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modalidad" class="form-label">Modalidad</label>
                                <select class="form-control @error('modalidad') is-invalid @enderror" name="modalidad">
                                    <!-- Opciones de modalidad, puedes ajustarlas según tus necesidades -->
                                    <option value="Intensivo" {{ old('modalidad') == 'Intensivo' ? 'selected' : '' }}>Intensivo</option>
                                    <option value="Regular" {{ old('modalidad') == 'Regular' ? 'selected' : '' }}>Regular</option>
                                </select>
                                @error('modalidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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