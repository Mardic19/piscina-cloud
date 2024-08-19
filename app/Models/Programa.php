<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $table = 'programa';
    protected $primaryKey = 'idPrograma';
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion', 'modalidad'];

    public function periodoProgramas()
    {
        return $this->hasMany(Periodo_Programa::class, 'idPrograma');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'DNI', 'DNI');
    }
}








