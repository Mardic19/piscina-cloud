<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'Alumno';
    protected $primaryKey = 'codAlumno';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'char';

    protected $fillable = [
        'codAlumno',
        'DNI',
        'Nivel',
        'condicionMedica',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI', 'DNI');
    }

    public function matricula()
    {
        return $this->hasOne(Matricula::class, 'codAlumno', 'codAlumno');
    }
   
    public function obtenerInformacionCompleta()
    {
        
        return $this->attributes + [
            'persona' => $this->persona,
            'avance' => $this->avance,
            'matricula' => $this->matricula,
        ];
    }
}


