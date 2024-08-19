<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodo';
    protected $primaryKey = 'idPeriodo';
    public $timestamps = false;
    protected $fillable = ['F_Inicio', 'Ciclo'];

   public function periodoProgramas()
    {
        return $this->hasMany(Periodo_Programa::class, 'idPeriodo');
    }
}
