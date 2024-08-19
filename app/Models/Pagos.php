<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PAGOS extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'idBoleta';
    public $timestamps = false;
    protected $fillable = ['idBoleta', 'idMatricula ', 'numMes'];
    public $incrementing = false;
    protected $keyType = 'char';

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'idMatricula');
    }
    public function boletaPago()
    {
        return $this->belongsTo(BoletaPago::class, 'idBoleta ');
    }

  
}
