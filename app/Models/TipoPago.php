<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;
    protected $table = 'tipopago';
    protected $primaryKey = 'idTipoPago';
    public $timestamps = false;
    protected $fillable = ['idTipoPago','descripcion'];
    public $incrementing = false;
    protected $keyType = 'char';
    public function boletaPagos()
    {
        return $this->hasMany(BoletaPago::class, 'idTipoPago');
    }

}

