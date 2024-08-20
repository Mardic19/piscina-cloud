<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
/* 'PDF' -> Barryvdh\DomPDF\Facade::class; 
 */
use PDF;
/* use Barryvdh\DomPDF\Facade as PDF; */


class AlumnoController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        // $busqueda = $request->get('busqueda');
        // $alumno= Alumno::where('codAlumno','like','%'.$busqueda.'%')->get();
        $busqueda=$request->get('busqueda');
        $alumno=Alumno::where('DNI','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        return view('alumno.index', compact('alumno','busqueda'));
    }

    public function create()
    {
        return view('alumno.create');
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'dni' => 'required|unique:alumno,DNI|numeric|digits:8', //'required|string|max:255|unique:persona',
            'Nombres' => 'required|unique:persona,Nombres|regex:/^[a-zA-Z\s]+$/',
            'celular' => 'required|unique:persona,Celular|numeric|digits:9',
            'edad' => 'required|numeric',
            'email' => 'required|email',

        ], [
            'dni.required' => 'Ingrese el DNI',
            'dni.numeric' => 'Este campo solo admite nùmeros',
            'dni.length' => 'Ingrese 8 digitos',
            'dni.unique' => 'Ya existe un registro con este DNI',

            'Nombres.required' => 'Ingrese NOMBRE y APELLIDO',
            'Nombres.regex' => 'Este campo solo admite letras',
            'Nombres.unique' => 'Ya existe un registro con este Nombre',

            'celular.required' => 'Ingrese el CELULAR',
            'celular.numeric' => 'Este campo solo admite nùmeros',
            'celular.regex' => 'Ingrese 9 digitos',
            'celular.unique' => 'Ya existe un registro con este Celular',

            'edad.required' => 'Ingrese el EDAD',
            'edad.numeric' => 'Este campo solo admite nùmeros',

            'email.required' => 'Ingrese el email',
            'email.email' => 'Debe ingresar su email valido',

        ]);

        // Crear una nueva persona si el DNI no existe
        $persona = Persona::firstOrNew(['DNI' => $request->dni]);
        $persona->Nombres = $request->Nombres;
        $persona->celular = $request->celular;
        $persona->edad = $request->edad;
        $persona->email = $request->email;
        $persona->save();

        // Crear un nuevo alumno
        $alumno = new Alumno();
        $alumno->codAlumno = $request->codAlumno;
        $alumno->nivel = $request->nivel;
        $alumno->condicionMedica = $request->condicionMedica;
        $alumno->dni = $request->dni;
        $alumno->save();

        //User
        $user=new User();
        $user ->name=$request->name;
        $user ->email=$request->email;
        $user ->password=bcrypt($request->password);
        $user->save();
        return redirect()->route('alumno.index')->with('datos', 'Registro exitoso');
    }


    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.edit', compact('alumno'));
    }


    public function edit($id)
    {
        //$alumno = Alumno::with('persona')->get();
        $alumno = Alumno::with('persona')->findOrFail($id);
        return view('alumno.edit', compact('alumno'));
    }


    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'dni' => 'required||string|max:8|min:8', //'required|string|max:255|unique:persona',
            'Nombres' => 'required',
            'celular' => 'required|numeric|digits:9',
            'edad' => 'required|numeric',
            'Correo' => 'required|email',

        ], [
            'dni.required' => 'Ingrese el DNI',
            'dni.numeric' => 'Este campo solo admite nùmeros',
            'dni.length' => 'Ingrese 8 digitos',
            'dni.unique' => 'Ya existe un registro con este DNI',

            'Nombres.required' => 'Ingrese NOMBRE y APELLIDO',
            'Nombres.regex' => 'Este campo solo admite letras',
            'Nombres.unique' => 'Ya existe un registro con este Nombre',

            'celular.required' => 'Ingrese el CELULAR',
            'celular.numeric' => 'Este campo solo admite nùmeros',
            'celular.regex' => 'Ingrese 9 digitos',
            'celular.unique' => 'Ya existe un registro con este Celular',

            'edad.required' => 'Ingrese el EDAD',
            'edad.numeric' => 'Este campo solo admite nùmeros',

            'Correo.required' => 'Ingrese el Correo',
            'Correo.email' => 'Debe ingresar su Correo valido',

        ]);

        $persona=Persona::findOrFail($request->dni);  

        $persona->dni = $request->dni;
        $persona->Nombres = $request->Nombres;
        $persona->celular = $request->celular;
        $persona->edad = $request->edad;
        $persona->Correo = $request->Correo;
        $persona->save();

        $alumno=Alumno::findOrFail($id);  

        $alumno->nivel = $request->nivel;
        $alumno->condicionMedica = $request->condicionMedica;
        $alumno->save();

        return redirect()->route('alumno.index')->with('datos', 'Registro Actualizado..!!');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $persona= Persona::findOrFail($alumno->dni);
        $alumno->delete();
        $persona->delete();
        return redirect()->route('alumno.index')->with('datos', 'Registro Eliminado...!');
    }


    public function downloadPDF()
    {

        $alumno = Alumno::all();
        view()->share('alumno.pdf', $alumno);

        $pdf = PDF::loadView('alumno.pdf', ['alumno' => $alumno]);
        return $pdf->download('alumno.pdf');
    }
}
