<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesor';
    protected $primaryKey = 'IdProfesor';
    public $timestamps = false;
    protected $fillable = ['IdProfesor','DNI', 'especialidad'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI');
    }
}