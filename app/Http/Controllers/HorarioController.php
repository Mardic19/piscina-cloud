<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Programa;
use App\Models\Profesor;
class HorarioController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $Turno = Horario::distinct()->pluck('Turno');
        $busqueda=$request->get('busqueda');    
        $horario = Horario::whereHas('programas', function($query) use ($busqueda) {
            $query->where('nombre', 'like', '%'.$busqueda.'%') ->orWhere('Turno', 'like', '%'.$busqueda.'%');
        })->paginate($this::PAGINATION);
        return view('horario.index',compact('horario','busqueda','Turno'));
    }
   

    public function create()
    {
        $programas=Programa::all();
        $profesores=Profesor::all();
        return view('horario.create',compact('programas','profesores'));
    }

    public function store(Request $request)
    {
        $data=request()->validate(
        [
            'vacantes'=>'required|numeric|digits:2',
            
        ],
        [
            'vacantes.required'=>'Ingrese N° de vacantes',
            'vacantes.numeric'=>'Solo números',
            'vacantes.digits'=>'Solo 2 digitos',

        ]);
        $diasSeleccionados = $request->input('dias_seleccionados');
        $cadenaDias = implode(',', $diasSeleccionados);
        $horario=new Horario();
        $horario->Turno=$request->Turno;
        $horario->vacantes=$request->vacantes;
        $horario->idPrograma=$request->idPrograma;
        $horario->idProfesor=$request->idProfesor;
        $horario->HInicio=$request->HInicio;
        $horario->HFinal=$request->HFinal;
        $horario->Dias=$cadenaDias;
        $horario->save();
        return redirect()->route('horario.index')->with('datos','Registro Nuevo guardado...!');
    }
    public function destroy($id){
        $horario=Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horario.index')->with('datos','Registro Eliminado...!');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $horario=Horario::findOrFail($id);
        $programas=Programa::all();
        $profesores=Profesor::all();
        return view('horario.edit',compact('horario','programas','profesores'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate(
        [
            'vacantes'=>'required|numeric|digits:2',
                
        ],
        [
            'vacantes.required'=>'Ingrese DNI',
            'vacantes.numeric'=>'Solo números',
            'vacantes.digits'=>'Solo 2 digitos',
    
        ]);
        $horario=Horario::findOrFail($id);      
        $horario->Turno=$request->Turno;
        $horario->vacantes=$request->vacantes;
        $horario->idPrograma=$request->idPrograma;
        $horario->idProfesor=$request->idProfesor;
        $horario->HInicio=$request->HInicio;
        $horario->HFinal=$request->HFinal;
        $horario->Dias=$request->Dias;
        $horario->save();
        return redirect()->route('horario.index')->with('datos','Registro Actualizado...!');
    }

  
}
