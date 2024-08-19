<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';
    protected $primaryKey = 'idMatricula';
    public $timestamps = false;
    protected $fillable = ['codAlumno', 'estadoMatricula', 'idPeriodo', 'idPrograma','idHorario', 'fechaRegistro', 'mesesFaltantes'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'codAlumno', 'codAlumno');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idPeriodo', 'idPeriodo');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma', 'idPrograma');
    }
    public function horario()
    {
        return $this->belongsTo(horario::class, 'idHorario', 'idHorario');
    }
}
