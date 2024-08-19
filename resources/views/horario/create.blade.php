@extends('layout.plantilla');

@section('titulo', 'Crear nuevo Horario')

@section('contenido')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dato de Registro de Horario</h4>
                    <form method="POST" action="{{ route('horario.store') }}">
                        @csrf
                        <br>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Turno:</label>
                                <select class="form-control" id="Turno" name="Turno">
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Tarde">Noche</option>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Hora Inicio:</label>
                                <input type="time" id="HInicio" name="HInicio" min="06:00" max="18:00" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Hora Final:</label>
                                <input type="time" id="HFinal" name="HFinal" min="06:00" max="18:00" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Vacantes:</label>
                                <input type="number"
                                    class="form-control py-2 px-4 leading-tight focus:outline-none @error('vacantes') is-invalid @enderror"
                                    name="vacantes" id="vacantes">
                                @error('vacantes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputEmail1" class="form-label">Dias:</label>
                                {{-- <input type="text"
                                    class="form-control py-2 px-4 leading-tight focus:outline-none"
                                    name="Dias" id="Dias"> --}}
                                    <ul class="list-group d-flex" style="flex-direction: row" name="Dias" id="Dias">
                                        <li class="list-group-item d-flex">
                                          <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Lunes" id="firstCheckbox">
                                          <label class="form-check-label" for="firstCheckbox">Lunes</label>
                                        </li>
                                        <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Martes" id="secondCheckbox">
                                          <label class="form-check-label" for="secondCheckbox">Martes</label>
                                        </li>
                                        <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Miércoles" id="thirdCheckbox">
                                          <label class="form-check-label" for="thirdCheckbox">Miércoles</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Jueves" id="fourCheckbox">
                                            <label class="form-check-label" for="fourCheckbox">Jueves</label>
                                          </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Viernes" id="fiveCheckbox">
                                            <label class="form-check-label" for="fiveCheckbox">Viernes</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Sábado" id="sixCheckbox">
                                            <label class="form-check-label" for="sixCheckbox">Sábado</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" name="dias_seleccionados[]" value="Domingo" id="sevenCheckbox">
                                            <label class="form-check-label" for="sevenCheckbox">Domingo</label>
                                        </li>
                                      </ul>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">PROGRAMA:</label>
                                <select
                                    class="bg-gray-300 appearance-none border-1 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none  focus:border-green-400"
                                    id="idPrograma" name="idPrograma">
                                    @foreach ($programas as $item)
                                        <option value="{{ $item->idPrograma }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1" class="form-label">NOMBRE PROFESOR:</label>
                                <select
                                    class="bg-gray-300 appearance-none border-1 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none  focus:border-green-400"
                                    id="idProfesor" name="idProfesor">
                                    @foreach ($profesores as $item)
                                        <option value="{{ $item->idProfesor  }}">{{ $item->persona->Nombres }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                       
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                                <a href="{{ route('cancelarHorario') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Horario.js') }}"></script>

@endsection





