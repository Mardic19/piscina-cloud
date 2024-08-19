@extends('layout.plantilla');

@section('titulo', 'Editar Horario')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

@section('contenido')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dato de Registro de Horario</h4>
                <form class="mt-4" method="POST" action="{{ route('horario.update', $horario->idHorario) }}">
                    @csrf
                    @method('put')
                    <br>

                    <div class="row">
                        <div class="form-group">

                            <label for=""> Codigo HORARIO</label>
                            <input type="text" name="idHorario" value="{{ $horario->idHorario }}">
                        </div>

                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Turno:</label>
                            <select class="form-control" id="Turno"name="Turno">
                     
                                <option value="Mañana" {{ $horario->Turno == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                                <option value="Tarde"{{ $horario->Turno == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                                <option value="Noche"{{ $horario->Turno == 'Noche' ? 'selected' : '' }}>Noche</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleInputEmail1" class="form-label">Hora Inicio : </label>
                            <input type="time" id="HInicio" name="HInicio" min="07:00" max="21:00"
                                value="{{ $horario->HInicio }}">

                        </div>
                        <div class="col-3">
                            <label for="exampleInputEmail1" class="form-label">Hora Final : </label>
                            <input type="time" id="HFinal" name="HFinal" value="{{ $horario->HFinal }}">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Vacantes</label>
                            <input type="text"
                                class="form-control py-2 px-4 leading-tight focus:outline-none @error('vacantes') is-invalid @enderror"
                                name="vacantes" value="{{ $horario->vacantes }}">
                            @error('vacantes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">PROGRAMA</label>
                            <select
                                class="bg-gray-300 appearance-none border-1 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none  focus:border-green-400"
                                id="grid-state" name="idPrograma">
                                
                                @foreach ($programas as $item)
                                    <option value="{{ $item->idPrograma }}" {{ $horario->idPrograma == $item->idPrograma ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">NOMBRE PROFESOR</label>
                            <select
                                class="bg-gray-300 appearance-none border-1 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none  focus:border-green-400"
                                id="grid-state" name="idProfesor">
                                @foreach ($profesores as $item)
                                    <option value="{{ $item->idProfesor }}"{{ $horario->idProfesor == $item->idProfesor ? 'selected' : '' }}>{{ $item->persona->Nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="exampleInputEmail1" class="form-label">Dias:</label>
                            <input type="text"
                                class="form-control py-2 px-4 leading-tight focus:outline-none"
                                name="Dias" id="Dias" value="{{ $horario->Dias }}">
                        </div>
                    </div>

            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('cancelarHorario') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>
            </form>

            </form>
        </div>
    </div>
    </div>

    
@endsection

@section('script')
<script src="{{ asset('js/jsHorario.js') }}"></script>
@endsection
