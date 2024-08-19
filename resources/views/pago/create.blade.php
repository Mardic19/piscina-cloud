@extends('layout.plantilla')

@section('titulo', 'Nuevo pago')

@section('contenido')
<div class="container">
    <div class="row d-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Datos Generales</h4>
                    <form class="mt-4" method="POST" action="{{ auth()->user()->name == 'admin' ? route('Matricula.Pagostore') : route('Matricula.Pagostore2') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">ALUMNO</label>
                            <input type="text" value="{{$Matricula->alumno->persona->Nombres}}" class="form-control" disabled>
                            <input type="hidden" value="{{$Matricula->idMatricula}}" class="form-control" name="idMatricula">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">TIPO DE PAGO</label>
                            <select class="form-control" name="idTipoPago">
                                @foreach($Tipo as $item)
                                <option value="{{$item->idTipoPago}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">NRO DE OPERACION</label>
                            <input type="text" class="form-control" name="idBoleta">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">MESES A PAGAR</label>
                            <select class="form-control" name="mesPago" id="mesPago">
                                @for ($i = 1; $i <= $Matricula->mesesFaltantes; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">MONTO</label>
                            <input value="{{$monto}}" type="text" class="form-control" id="monto" name="monto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">FECHA DE PAGO</label>
                            <input type="date" class="form-control" name="fecha">
                        </div>
                        <div class="col-12">
                            <input type="file" name="imagenPago">
                        </div>
                        <br>

                        <button id="grabarBtn" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                        <a href="{{ auth()->user()->name == 'admin' ? route('cancelarpago') : route('cancelarpago2') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('login/images/profesor.jpg') }}" alt="Imagen" class="img-fluid" style="max-width: 100%; max-height: 100%;">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="card-title">Pagos</h4>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nº Operacion</th>
                        <th scope="col">monto</th>
                        <th scope="col">fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($BoletaPago as $periodo)
                        <tr>
                            <td>{{ $periodo->idBoleta }}</td>
                            <td>{{ $periodo->monto }}</td>
                            <td>{{ $periodo->fecha }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"><b>No hay programas registrados</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var montos = parseFloat(document.getElementById('monto').value);
    document.getElementById('mesPago').addEventListener('change', function() {
        var mesPago = parseInt(this.value);
        var nuevoMonto = montos * mesPago;
        document.getElementById('monto').value = nuevoMonto.toFixed(2);;
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var select = document.getElementById('mesPago');
        var grabarBtn = document.getElementById('grabarBtn');

        // Deshabilitar el botón si el select no tiene opciones
        if (select.options.length === 0) {
            grabarBtn.disabled = true;
        }
    });
</script>
@endsection

