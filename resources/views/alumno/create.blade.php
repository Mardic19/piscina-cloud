

@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <div class="row d-flex">
        <div class="col-md-6">
            <Center>
                <h1>VISTA CREAR ALUMNOS</h1>
            </Center>

            <form method="POST" action="{{ route('alumno.store') }}">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for=""> Nombres y Apellidos :</label>
                        <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres"
                            name="nombres">

                        @error('nombres')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <label for=""> Usuario :</label>
                    <input type="text" class="form-control" id="name" name="name" readonly>

                    <div class="form-group">
                        <label for=""> DNI:</label>
                        <input type="number"  class="form-control @error('dni') is-invalid @enderror" id="dni"
                            name="dni">

                        @error('dni')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <label for=""> Contraseña:</label>
                    <input type="text" class="form-control" id="password" name="password" readonly>
                    <!-- Otros campos de Persona -->
                    <div class="form-group">
                        <label for=""> NUMERO CELULAR:</label>
                        <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular"
                            name="celular">

                        @error('celular')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> EDAD:</label>
                        <input type="number" class="form-control @error('edad') is-invalid @enderror" id="edad"
                            name="edad">

                        @error('edad')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> CORREO:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email">

                        @error('email')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <!-- Fin de campos de Persona -->

                    <!-- Campos de Alumno -->
                    <div class="form-group">
                        <label for=""> Código de Alumno:</label>
                        <input type="text" class="form-control @error('codAlumno') is-invalid @enderror" id="codAlumno"
                            name="codAlumno">

                        @error('codAlumno')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> Nivel:</label>
                        <select class="form-control @error('nivel') is-invalid @enderror" name="nivel" id="nivel">
                            <option value="Basico">Basico</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                        </select>

                        @error('nivel')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> Condición Médica:</label>
                        <input type="text" class="form-control @error('condicionMedica') is-invalid @enderror"
                            id="condicionMedica" name="condicionMedica">

                        @error('condicionMedica')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <!-- Fin de campos de Alumno -->
                </div>

                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('cancelarAlumno') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>

            </form>
        </div>
        <div class="col-md-6 text-center" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('login/images/alumno.jpg') }}" alt="Imagen" class="img-fluid"
                style="max-width: 100%; max-height: 100%;">
        </div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
        // Obtener los elementos de entrada
        var nombresInput = document.getElementById('nombres');
        var primeraPalabraInput = document.getElementById('name');

        // Agregar un event listener para el evento input en el campo de entrada 'nombres'
        nombresInput.addEventListener('input', function () {
            // Obtener el valor actual del campo de entrada 'nombres'
            var nombresValue = nombresInput.value;

            // Separar la primera palabra del valor
            var primeraPalabra = nombresValue.split(' ')[0];

            // Establecer la primera palabra como valor predeterminado en el campo 'primera-palabra'
            primeraPalabraInput.value = primeraPalabra;
        });

        var dni = document.getElementById('dni');
        var password = document.getElementById('password');
        dni.addEventListener('input', function () {
            password.value = dni.value;
        });
    });
</script>
@endsection
