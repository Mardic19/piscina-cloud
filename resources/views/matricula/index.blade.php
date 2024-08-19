@extends('layout.plantilla')

@section('titulo', 'Matriculas')

@section('contenido')

    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>MATRICULAS</h1>
        </center>
        <br>
        @if(auth()->user()->name == 'admin')
        <nav class="navbar float-right">
            <form class="form-inline my-2" method="GET">
                <input class="form-control me-2" placeholder="Buscar idMatricula" name="busqueda" type="search"
                    aria-label="Search" value="{{$busqueda}}">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>
        @endif
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Alumno</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Deuda de pago(N° meses)</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @if (count($matricula) <= 0)
                    <tr>
                        <td colspan="6"><b>No hay registros</b></td>
                    </tr>
                @else
                    @foreach ($matricula as $itemMatricula)
                        <tr>
                            <td>{{ $itemMatricula->alumno->persona->Nombres }}</td>
                            <td>{{ $itemMatricula->periodo->Ciclo}}</td>
                            <td>{{ $itemMatricula->programa->nombre }}</td>
                            <td>{{ $itemMatricula->estadoMatricula }}</td>
                            <td>{{ $itemMatricula->mesesFaltantes }}</td>
                            <td>
                                @if(auth()->user()->name == 'admin')
                                <a href="{{ route('Matricula.edit', $itemMatricula->idMatricula) }}"
                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                <form action="{{ route('Matricula.destroy', $itemMatricula->idMatricula) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i>Eliminar</button>
                                </form>
                                @endif
                                <a href="{{ route('Matricula.Pagonuevo', $itemMatricula->idMatricula) }}" class="btn btn-primary btn-sm">Pago</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if(auth()->user()->name == 'admin') {{$matricula->links()}}@endif
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var filas = document.querySelectorAll("table.table tbody tr");
    
            for (var i = 0; i < filas.length; i++) {
                var nombreAlumno = filas[i].querySelector("td:first-child").textContent.split(' ')[0];
                var nombreUsuario = '{{ auth()->user()->name }}';
    
                if (nombreUsuario !== 'admin' && nombreAlumno !== nombreUsuario) {
                    filas[i].style.display = 'none';
                }
            }
        });
    </script>
@endsection