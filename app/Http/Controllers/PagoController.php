<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoletaPago;
use App\Models\TipoPago;
use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Periodo_Programa;
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PAGOS=BoletaPago::all();
        //$Profesor = Profesor::with('persona')->get();
        return view('pago.index', compact('PAGOS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $Tipo=TipoPago::all();
        // $Persona=Alumno::all();
        // $Matricula=Matricula::findOrFail($id);     
        // //$Matricula=Matricula::all();  
        // // $Programa = Periodo_Programa::where('idPrograma', $Matricula->idPrograma)->where('idPeriodo', $Matricula->idPeriodo)->firstOrFail();
        // // $monto=$Programa->costo;
        // $monto=$id;
        // return view('pago.create', compact('Tipo','Persona','Matricula','monto'));
    }
    public function nuevo($id)
    {
        $Tipo=TipoPago::all();
        $Matricula=Matricula::findOrFail($id);     
        //$Matricula=Matricula::all();  
        $Programa = Periodo_Programa::where('idPrograma', $Matricula->idPrograma)->where('idPeriodo', $Matricula->idPeriodo)->firstOrFail();
        $monto=$Programa->costo;
        return view('pago.create', compact('Tipo','Matricula','monto'));
    }
    // public function create(Request $id)
    // {
    //     $Tipo=TipoPago::all();
    //     $Persona=Alumno::all();
    //     $Matricula=Matricula::all();
    //     return view('pago.create', compact('Tipo','Persona','Matricula'));
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->back()->with('datos', 'Registro Nuevo guardado...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
