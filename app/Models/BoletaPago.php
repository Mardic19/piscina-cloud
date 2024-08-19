<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoletaPago extends Model
{
    protected $table = 'boleta_pago';
    protected $primaryKey = 'idBoleta';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'char';
    protected $fillable = [
        'idBoleta',
        'DNI',
        'monto',
        'fecha',
        'idTipoPago'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI', 'DNI');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'idTipoPago', 'idTipoPago');
    }
}
