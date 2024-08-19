@extends('layout.plantilla')
@section('titulo', 'Horario')
@section('contenido')
    <div class="container">
        <br>
        <br>
        <br>
        <center>
            <h1>Horario</h1>
        </center>

        <br>
        <div class="d-md-flex justify-content-between">
        <a href="{{ route('horario.create') }}" class="btn btn-secondary btn-md" role="button">Registrar Horario</a>
        <form class="row" method="GET">
        <select class="form-control" style="width: auto;" id="grid-state" name="busqueda" value="{{$busqueda}}">
            <option value="">Todos</option>
            @foreach($Turno as $item)
            <option value="{{$item}}" <?php if ($busqueda==$item) {echo "selected";}?>>{{$item}}</option>
            
            @endforeach
        </select>
        <button class="btn btn-success" type="submit">filtrar</button>
    </form>
        <nav class=" float-right">
            <form class="form-inline" method="GET">
                <input class="form-control me-2" placeholder="Buscar por programa" name="busqueda" type="search"
                    aria-label="Search" value="{{$busqueda}}">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>
        </div>
        <div id="mensaje">
            @if (session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">Dias</th>
                    <th scope="col">Turnos</th>
                    <th scope="col">Vacantes</th>
                    <th scope="col">IDPrograma</th>
                    <th scope="col">IDProfesor</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Hora Final</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>

            <tbody>
                <tr>

                    @if (count($horario) <= 0)
                <tr>
                    <td colspan="3"><b>No hay registros</b></td>
                </tr>
            @else
                @foreach ($horario as $itemHorario)
                    <tr>
                        <td>{{ $itemHorario->Dias }}</td>
                        <td>{{ $itemHorario->Turno }}</td>
                        <td>{{ $itemHorario->vacantes }}</td>
                        <td>{{ $itemHorario->programas->nombre }}</td>
                        <td>{{ $itemHorario->profesores->persona->Nombres }}</td>
                        <td>{{ $itemHorario->HInicio }}</td>
                        <td>{{ $itemHorario->HFinal }}</td>
                        <td>
                             <a href="{{ route('horario.edit', $itemHorario->idHorario) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-edit"></i>Editar</a> 
                            <form action="{{ route('horario.destroy', $itemHorario->idHorario) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar
                                </button>
                            </form> 
                        </td>

                    </tr>
                @endforeach
                @endif
                </tr>
            </tbody>


        </table>
        {{$horario->links()}}
       

    </div>

@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
