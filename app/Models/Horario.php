<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    protected $table = 'horario';
    protected $primaryKey = 'idHorario';
    public $timestamps = false;
    protected $fillable = ['Turno', 'HInicio', 'HFinal', 'Dias','idPrograma', 'idProfesor', 'vacantes'];

    public function programas(){
        return $this->belongsTo(Programa::class,'idPrograma');
    }
    public function profesores(){
        return $this->belongsTo(Profesor::class,'idProfesor');
    }

}


