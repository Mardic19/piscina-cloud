<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
// use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\periodo_programaController;
use App\Http\Controllers\PagoController;
/* Route::get('/', function () {
    return view('login');
}); */

Route::get('/',[UserController::class,'showlogin']);
Route::post('/identificacion', [UserController::class,'verificalogin'])->name('identificacion'); 
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::post('/',[UserController::class,'salir'])->name('logout');

Route::resource('programa', ProgramaController::class);
Route::get('cancelarPrograma', function () {
    return redirect()->route('programa.index')->with('datos','Acción Cancelada...!');
})->name('cancelarPrograma');

//Route::get('nivel/', [ProgramaController::class,'nivel'])->name('nivel');
//Route::get('edit', [ProgramaController::class,'edit'])->name('edit');

Route::resource('horario', HorarioController::class);
Route::get('cancelarHorario', function () {
    return redirect()->route('horario.index')->with('datos','Acción Cancelada...!');
})->name('cancelarHorario');

route::resource('profesor',ProfesorController::class);
Route::get('cancelarProfesor', function () {
    return redirect()->route('profesor.index')->with('datos','Acción Cancelada...!');
})->name('cancelarProfesor');

/* MATRICULA */
route::resource('Matricula',MatriculaController::class);
Route::get('cancelar', function () {
    return redirect()->route('Matricula.index')->with('datos','Acción Cancelada...!');
})->name('cancelar');
Route::get('Pagonuevo/{matricula}',[MatriculaController::class,'Pagonuevo'])->name ('Matricula.Pagonuevo');
Route::post('Pagostore',[MatriculaController::class,'Pagostore'])->name('Matricula.Pagostore');
Route::get('index2',[MatriculaController::class,'index2'])->name('Matricula.index2');
Route::post('Pagostore2',[MatriculaController::class,'Pagostore2'])->name('Matricula.Pagostore2');
/* ALUMNO */
 route::resource('alumno',AlumnoController::class); 
/* Route::get('/index',[AlumnoController::class,'index'])->name('index'); */
 route::get('/download-pdf',[AlumnoController::class,'downloadPDF'])->name('download-pdf');   
Route::get('cancelarAlumno', function () {
    return redirect()->route('alumno.index')->with('datos','Acción Cancelada...!');
})->name('cancelarAlumno');

Route::resource('periodo', PeriodoController::class);
Route::resource('periodo_programa', periodo_programaController::class);
Route::get('cancelarP', function () {
    return redirect()->route('periodo_programa.index')->with('datos','Acción Cancelada...!');
})->name('cancelarP');
Route::resource('pago', PagoController::class);
Route::get('cancelarpago', function () {
    return redirect()->route('Matricula.index')->with('datos','Acción Cancelada...!');
})->name('cancelarpago');
Route::get('cancelarpago2', function () {
    return redirect()->route('Matricula.index2')->with('datos','Acción Cancelada...!');
})->name('cancelarpago2');