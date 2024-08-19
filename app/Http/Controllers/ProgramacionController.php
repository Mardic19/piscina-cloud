<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramacionController extends Controller
{
    
    public function programa(){
        return view('programacion/programa');
    }
    

    public function nivel(){
        return view('programacion/nivel');
    }

    public function periodo(){
        return view('programacion/periodo');
    }

}*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use App\Models\Horario;

class ProgramaController extends Controller
{
    public function edit(Programa $programa){
        $programa=Programa::all();
        return view('programacion.programa',compact('programa'));
       }

    public function index()
    {
        $programa=Programa::all();
        return view('programacion.nivel',compact('programa'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

    
   
    public function show($Programa)
    {
        $progra=Programa::findOrFail($Programa);
        $Programas=$Programa;
        $horario=Horario::where('IDPROGRAMA','like','%'.$Programas.'%')->get();
    return view('programacion.VistaHorarios',compact('horario','progra'));
    }


    public function update(Request $request,$id)
    {
        $programa=Programa::findOrFail($id);
        $programa->IDPROGRAMA;
        $programa->NOMBRE;
        $programa->F_INICIO=$request->F_INICIO;
        $programa->F_FINAL=$request->F_FINAL;
        $programa->save();
        return redirect()->route('programa.index');
    }

   
    public function destroy($id)
    {
        //
    }

    public function nivel() {
        return view('programacion.nivel');
    }

}

