<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Programa;

class ProgramaController extends Controller
{   const PAGINATION=5;
    public function index(Request $request)
    {
        //$programas = Programa::all();
        $buscarpor = $request->get('buscarpor');
        $programas = Programa::where('idPrograma', 'like', '%' . $buscarpor . '%')->paginate($this::PAGINATION);
        return view('programa.index', compact('programas', 'buscarpor'));
    }

    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programa.edit', compact('programa'));
    }
    public function create()
    {
        return view('programa.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'required|string|max:100',
            'modalidad' => 'required|string|in:Intensivo,Regular',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('programa.create')
                ->withErrors($validator)
                ->withInput();
        }

        $Programa = new Programa();
        $Programa->nombre = $request->nombre;
        $Programa->descripcion = $request->descripcion;
        $Programa->modalidad = $request->modalidad;
       
        $Programa->save();

        return redirect()->route('programa.index')->with('datos', 'Programa creado correctamente.');
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'required|string|max:100',
            'modalidad' => 'required|string|in:Intensivo,Regular',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('programa.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $Programa = Programa::findOrFail($id);
        $Programa->nombre = $request->nombre;
        $Programa->descripcion = $request->descripcion;
        $Programa->modalidad = $request->modalidad;
        $Programa->save();


        return redirect()->route('programa.index')->with('datos', 'Programa actualizado correctamente.');
    }



    public function destroy($id)
    {
        $Programa = Programa::findOrFail($id);
        $Programa->delete();
        return redirect()->route('programa.index')->with('datos', 'Registro Eliminado...!');
    }
}