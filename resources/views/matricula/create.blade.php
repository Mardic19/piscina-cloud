@extends('layout.plantilla')

@section('titulo', 'Nueva Matricula')

@section('contenido')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos Generales</h4>
                <form class="mt-4" method="POST" action="{{ route('Matricula.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="row">          
                            <div class="col-4">
                                <label for="codAlumno" class="form-label">ALUMNO</label>
                                <select class="form-control" id="codAlumno" name="codAlumno">
                                    @foreach ($alumnos as $item)
                                        <option value="{{ $item->codAlumno }}">{{ $item->persona->Nombres }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="col-4">
                                <label for="idPrograma" class="form-label">PROGRAMA</label>
                                <select class="form-control" id="idPrograma" name="idPrograma">
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->idPrograma }}">{{ $programa->programa->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="idPeriodo" class="form-label">PERIODO</label>
                                <input class="form-control"  type="text" value="{{ $periodos->Ciclo  }}" disabled>
                                <input type="hidden" class="form-control"  type="text" id="idPeriodo" value="{{ $periodos->idPeriodo  }}" name="idPeriodo">
                            </div>
                        </div>
                        <br>
                        <button id="filtrarHorarios" class="btn btn-primary mt-2">Ver Horarios</button>
                        <ul class="list-group form-group" id="listaHorarios" style="display: none;">
                            @foreach ($horarios as $horario)
                            <li class="list-group-item" data-programa="{{ $horario->idPrograma }}"data-periodo="{{ $horario->idPrograma }}">                             
                              <input class="form-check-input me-1" type="radio" name="idHorario" value="{{ $horario->idHorario}}" id="idHorario">
                              <label class="form-check-label" for="firstRadio">{{ $horario->Dias}}<b> | Hora:</b> {{ $horario->HInicio}}-{{ $horario->HFinal}}<b> | Docente:</b> {{ $horario->profesores->persona->Nombres}}</label>                           
                            </li>
                            @endforeach
                        </ul>
                        <div class="row">
                            <div class="col-6">
                                <label for="fechaRegistro" class="form-label">FECHA DE REGISTRO</label>
                                <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro">
                            </div>
                            
                        </div>
                        <br>
                    </div>
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
                    <a href="{{ route('cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('filtrarHorarios').addEventListener('click', function() {
            event.preventDefault();
            var programaSeleccionado = document.getElementById('idPrograma').value;
            var periodo = document.getElementById('idPeriodo').value;
            var horarios = document.querySelectorAll('.list-group-item');
            var listaHorarios = document.getElementById('listaHorarios');
    
            // Mostrar la lista de horarios
            listaHorarios.style.display = 'block';
            horarios.forEach(function(horario) {
                if (horario.getAttribute('data-programa') !== programaSeleccionado) {
                    horario.style.display = 'none';
                } else {
                    horario.style.display = 'block';
                }
            });
        });
    </script>
    @if(auth()->user()->name !== 'admin')
    <script>
        // Obtener el nombre del usuario autenticado
        var nombreUsuario = '{{ auth()->user()->name }}';
    
        // Obtener el select
        var select = document.getElementById('codAlumno');
        // Recorrer las opciones del select
        for (var i = 0; i < select.options.length; i++) {
            var opcion = select.options[i];
            // Comparar la primera palabra de la opción con el nombre de usuario
            if (opcion.text.split(' ')[0] === nombreUsuario) {
                // Si coincide, seleccionar la opción
                opcion.selected = true;
                break;
            }
        }
        select.disabled = true;
    </script>
    @endif
@endsection