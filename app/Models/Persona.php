<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'DNI';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'char';

    protected $fillable = [
        'DNI',
        'Nombres',
        'Edad',
        'Celular',
        'email',
    ];


    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'DNI', 'DNI');
    }

    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'DNI', 'DNI');
    }

    public function boletaPagos()
    {
        return $this->hasMany(BoletaPago::class, 'DNI', 'DNI');
    }
}
