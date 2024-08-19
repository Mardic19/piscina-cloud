<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\Programa;
use App\Models\horario;
use App\Models\Periodo_Programa;
use App\Models\BoletaPago;
use App\Models\TipoPago;
use DateTime;

class MatriculaController extends Controller
{
    const PAGINATION = 5;

    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $matricula = Matricula::where('idMatricula', 'like', '%' . $busqueda . '%')->paginate($this::PAGINATION);
        //$matricula = Matricula::all();
        $alumno = Alumno::with('matricula')->get();
        return view('matricula.index', compact('matricula', 'alumno', 'busqueda'));
    }
    public function index2(Request $request)
    {
        $matricula = Matricula::all();
        $alumno = Alumno::with('matricula')->get();
        return view('matricula.index', compact('matricula', 'alumno'));
    }


    public function create()
    {
        $alumnos = Alumno::all();
        $periodos = Periodo::orderBy('idPeriodo', 'desc')->first();
        $id = $periodos->idPeriodo;
        $programas = Periodo_Programa::where('idPeriodo', 'like', '%' . $id . '%')->get();
        $horarios = horario::all();
        return view('Matricula.create', compact('alumnos', 'periodos', 'programas', 'horarios'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'codAlumno' => 'required',
            'idPrograma' => 'required',
            'idPeriodo' => 'required',
            'fechaRegistro' => 'required|date',
        ]);
        $Matricula = new Matricula();
        $Matricula->codAlumno = $request->codAlumno;
        $Matricula->estadoMatricula = 'Activa';
        $Matricula->idPeriodo = $request->idPeriodo;
        $Matricula->idPrograma = $request->idPrograma;
        $Matricula->idHorario = $request->idHorario;
        $Matricula->fechaRegistro = $request->fechaRegistro;
        $Programa = Periodo_Programa::where('idPrograma', $request->idPrograma)->where('idPeriodo', $request->idPeriodo)->firstOrFail();
        $inicio = new DateTime($Programa->inicio);
        $fin = new DateTime($Programa->termino);
        // Calcular la diferencia entre las fechas
        $diferencia = $inicio->diff($fin);

        // Obtener el número de meses de la diferencia
        $meses = ($diferencia->y * 12) + $diferencia->m;
        $Matricula->mesesFaltantes = $meses;
        $Matricula->save();

        $Horario = horario::findOrFail($request->idHorario);
        $vacante=$Horario->vacantes;
        if ($vacante > 0) {
            // Restar 1 a las vacantes
            $Horario->vacantes = $vacante - 1;
            $Horario->save();
        }
        return redirect()->route('Matricula.index')->with('datos', 'Matrícula creada correctamente.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);
        $alumnos = Alumno::all();
        $periodos = Periodo::all();
        $programas = Programa::all();
        return view('Matricula.edit', compact('matricula', 'alumnos', 'periodos', 'programas'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'codAlumno' => 'required',
            'idPrograma' => 'required',
            'idPeriodo' => 'required',
            'fechaRegistro' => 'required|date',
        ]);


        $Matricula = Matricula::findOrFail($request->idMatricula);
        //$Matricula->IdMatricula = $request->idMatricula;
        $Matricula->codAlumno = $request->codAlumno;
        $Matricula->estadoMatricula = $request->estadoMatricula;
        $Matricula->idPeriodo = $request->idPeriodo;
        $Matricula->idPrograma = $request->idPrograma;
        $Matricula->fechaRegistro = $request->fechaRegistro;   
        $Matricula->save();

        return redirect()->route('Matricula.index')->with('datos', 'Matrícula actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Matricula = Matricula::findOrFail($id);
        $Matricula->delete();
        return redirect()->route('Matricula.index')->with('datos', 'Registro Eliminado...!');
    }


    public function Pagonuevo($id)
    {
        $Tipo=TipoPago::all();
        $Matricula=Matricula::findOrFail($id);     
        //$Matricula=Matricula::all();  
        $BoletaPago = BoletaPago::where('idMatricula', $id)->get();
        $Programa = Periodo_Programa::where('idPrograma', $Matricula->idPrograma)->where('idPeriodo', $Matricula->idPeriodo)->firstOrFail();
        $monto=$Programa->costo;

        return view('pago.create', compact('Tipo','Matricula','monto','BoletaPago'));
    }
    public function Pagostore(Request $request)
    {
        $BoletaPago = BoletaPago::firstOrNew(['idBoleta' => $request->idBoleta]);
        $BoletaPago->idMatricula  = $request->idMatricula;
        $BoletaPago->monto = $request->monto;
        $BoletaPago->fecha = $request->fecha;
        $BoletaPago->idTipoPago = $request->idTipoPago;
        $BoletaPago->mesPago = $request->mesPago;
        $BoletaPago->imagenPago = $request->imagenPago;
        $BoletaPago->save();

        $Matricula = Matricula::findOrFail($request->idMatricula);
        $meses=$Matricula->mesesFaltantes;
        $Matricula->mesesFaltantes=$meses-$BoletaPago->mesPago;
        $Matricula->save();
        return redirect()->route('Matricula.index')->with('datos', 'Registro Nuevo guardado...!');
    }
    public function Pagostore2(Request $request)
    {
        $BoletaPago = BoletaPago::firstOrNew(['idBoleta' => $request->idBoleta]);
        $BoletaPago->idMatricula  = $request->idMatricula;
        $BoletaPago->monto = $request->monto;
        $BoletaPago->fecha = $request->fecha;
        $BoletaPago->idTipoPago = $request->idTipoPago;
        $BoletaPago->mesPago = $request->mesPago;
        $BoletaPago->imagenPago = $request->imagenPago;
        $BoletaPago->save();

        $Matricula = Matricula::findOrFail($request->idMatricula);
        $meses=$Matricula->mesesFaltantes;
        $Matricula->mesesFaltantes=$meses-$BoletaPago->mesPago;
        $Matricula->save();
        return redirect()->route('Matricula.index2')->with('datos', 'Registro Nuevo guardado...!');
    }
}
