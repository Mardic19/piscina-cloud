<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo_Programa extends Model
{
    use HasFactory;
    protected $table = 'periodo_programa';
    public $timestamps = false;

    protected $fillable = ['idPeriodo', 'idPrograma', 'costo','inicio','termino'];

    // Define the composite primary key using the protected $primaryKey array
    protected $primaryKey = 'idPeriodo, idPrograma';

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idPeriodo');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

}
