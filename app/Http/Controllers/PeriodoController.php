<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Horario;
class PeriodoController extends Controller
{
    public function edit($Periodo){
        $Periodo=Periodo::findOrFail($Periodo);
        return view('periodo.edit',compact('Periodo'));
       }

    public function index()
    {
        $Periodo=Periodo::all();
        return view('periodo.index',compact('Periodo'));
    }

  
    public function create()
    {
        return view('periodo.create');
    }

  
    public function store(Request $request)
    {
        $Periodo = new Periodo();
        $Periodo->F_Inicio = $request->F_Inicio;
        $Periodo->Ciclo = $request->Ciclo;
       
        $Periodo->save();

        return redirect()->route('periodo.index')->with('datos', 'Periodo creado correctamente.');
    }

    
   
    public function show($Periodo)
    {

    }


    public function update(Request $request,$id)
    {
        $Periodo=Periodo::findOrFail($id);
        $Periodo->F_Inicio = $request->F_Inicio;
        $Periodo->Ciclo = $request->Ciclo;
        $Periodo->save();
        
        return redirect()->route('periodo.index');
    }

   
    public function destroy($id)
    {
        $Periodo = Periodo::findOrFail($id);
        $Periodo->delete();
        return redirect()->route('periodo.index')->with('datos', 'Registro Eliminado...!');
    }

    public function nivel() {
        return view('programacion.nivel');
    }

}
