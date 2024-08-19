@extends('layout.plantilla')

@section('titulo', 'PAGOS')


@section('contenido')


    <div class="container">
        <br>
        <br>
        <br>

        <center>
            <h1>VISTA PAGOS</h1>
        </center>
        <br>
        <a href="{{ route('pago.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">IdMatricula</th>
                    <th scope="col">idBoleta</th>
                </tr>
            </thead>
            <tbody>


                @if (count($PAGOS) <= 0)
                    <tr>
                        <td colspan="3"><b>No hay registros</b></td>
                    </tr>
                @else
                    @foreach ($PAGOS as $itemPAGOS)
                        <tr>
                            <td>{{ $itemPAGOS->idMatricula  }}</td>
                            <td>{{ $itemPAGOS->idBoleta }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
