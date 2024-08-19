<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Persona;
use App\Models\Alumno;
class ProfesorController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $persona=Persona::all();
        $Profesor = Profesor::where('idProfesor', 'like', '%' . $buscarpor . '%')->paginate($this::PAGINATION);
        //$Profesor = Profesor::with('persona')->get();
        return view('profesor.index', compact('Profesor', 'buscarpor','persona'));
    }

    public function create()
    {
        return view('Profesor.create');
    }

    public function edit($id)
    {
        $Profesor = Profesor::with('persona')->findOrFail($id);
        return view('Profesor.edit', compact('Profesor'));
    }


    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'dni' => 'required|numeric|unique:profesor,DNI|digits:8',
                'NOMBRES' => 'required|regex:/^[\pL\s\-]+$/u|unique:persona,Nombres',
                'CELULAR' => 'required|numeric|unique:persona,Celular|digits:9',
                'EDAD' => 'required|numeric',
                'idProfesor' => 'required',
                'CORREO' => 'required|email'
            ],
            [

                'idProfesor.required' => 'Ingrese idProfesor',
                'idProfesor.unique' => 'Ya existe un registro con este idProfesor',

                'dni.required' => 'Ingrese DNI',
                'dni.unique' => 'Ya existe un registro con este DNI',
                'dni.numeric' => 'Solo números',
                'dni.digits' => 'Solo 8 digitos',

                'NOMBRES.required' => 'Ingrese nombres y apellidos del profesor',
                'NOMBRES.unique' => 'Ya existe un cliente con esos nombres',
                'NOMBRES.regex' => 'Solo letras',

                'CELULAR.required' => 'Ingrese CELULAR',
                'CELULAR.unique' => 'Ya existe un registro con este CELULAR',
                'CELULAR.numeric' => 'Solo números',
                'CELULAR.digits' => 'Solo 9 digitos',

                'EDAD.required' => 'Ingrese EDAD',
                'EDAD.numeric' => 'Solo números',

                'CORREO.required' => 'Ingrese CORREO',
                'CORREO.email' => 'Dirección de correo invalida',


                'especialidad.required' => 'Ingrese especialidad y apellidos del profesor',
                'especialidad.unique' => 'Ya existe un cliente con esos especialidad',
                'especialidad.regex' => 'Solo letras'

            ]
        );

        $persona = Persona::firstOrNew(['DNI' => $request->dni]);
        $persona->nombres = $request->NOMBRES;
        $persona->celular = $request->CELULAR;
        $persona->edad = $request->EDAD;
        $persona->correo = $request->CORREO;
        $persona->save();


        $Profesor = new Profesor();
        $Profesor->IdProfesor = $request->idProfesor;
        $Profesor->DNI = $request->dni;
        $Profesor->especialidad = $request->especialidad;
        $Profesor->save();
        return redirect()->route('profesor.index')->with('datos', 'Registro Nuevo guardado...!');
    }


    public function destroy($id)
    {
        $Profesor = Profesor::findOrFail($id);
        $Profesor->delete();
        return redirect()->route('profesor.index')->with('datos', 'Registro Eliminado...!');
    }

    public function update(Request $request, $id)
    {

        $data = request()->validate(
            [
                'dni' => 'numeric|digits:8',
                'NOMBRES' => 'required',
                'CELULAR' => 'numeric|digits:9',
                'EDAD' => 'numeric',
                'idProfesor' => 'required',
                'CORREO' => 'required|email'
            ],
            [

                'idProfesor.required' => 'Ingrese idProfesor',

                'dni.required' => 'Ingrese DNI',
                'dni.numeric' => 'Solo números',
                'dni.digits' => 'Solo 8 digitos',

                'NOMBRES.required' => 'Ingrese nombres y apellidos del profesor',
                'NOMBRES.regex' => 'Solo letras',

                'CELULAR.required' => 'Ingrese CELULAR',
                'CELULAR.numeric' => 'Solo números',
                'CELULAR.digits' => 'Solo 9 digitos',

                'EDAD.required' => 'Ingrese EDAD',
                'EDAD.numeric' => 'Solo números',

                'CORREO.required' => 'Ingrese CORREO',
                'CORREO.email' => 'Dirección de CORREO invalida',

                'especialidad.required' => 'Ingrese especialidad y apellidos del profesor',
                'especialidad.regex' => 'Solo letras'

            ]
        );


        $persona = Persona::findOrFail($request->dni);
        $persona->DNI = $request->dni;
        $persona->Nombres = $request->NOMBRES;
        $persona->Celular = $request->CELULAR;
        $persona->Edad = $request->EDAD;
        $persona->Correo = $request->CORREO;
        $persona->save();


        $Profesor = Profesor::findOrFail($id);
        $Profesor->idProfesor = $request->idProfesor;
        $Profesor->DNI = $request->dni;
        $Profesor->especialidad = $request->especialidad;
        $Profesor->save();


        return redirect()->route('profesor.index')->with('datos', 'Registro Actualizado...!');
    }
}
