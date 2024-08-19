<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo_Programa;
use App\Models\Periodo;
use App\Models\Programa;
class periodo_programaController extends Controller
{
    public function index()
    {
        $PeriPrograma=Periodo_Programa::all();
        return view('programacion.index',compact('PeriPrograma'));
    }
    public function create()
    {
        $periodos = Periodo::all();
        $programas = Programa::all();
        return view('programacion.create',compact('periodos', 'programas'));
    }
    public function store(Request $request)
    {
        $Periodo = new Periodo_Programa();
        $Periodo->idPeriodo = $request->idPeriodo;
        $Periodo->idPrograma = $request->idPrograma;
        $Periodo->costo = $request->costo;
        $Periodo->inicio = $request->inicio;
        $Periodo->termino = $request->termino;
        $Periodo->save();

        return redirect()->route('periodo_programa.index')->with('datos', 'Registrado correctamente.');
    }
    public function destroy($id)
    {
        $Periodo = Periodo_Programa::findOrFail($id);
        $Periodo->delete();
        return redirect()->route('periodo_programa.index')->with('datos', 'Registro Eliminado...!');
    }
}
