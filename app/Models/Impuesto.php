<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use HasFactory;
    protected $table = "tipo_impuesto";
    public $timestamps = false;
    protected $primaryKey = 'TPIM_ID';
    protected $fillable = ['TPIM_ID', 'TPIM_DESCRIPCION','TPIM_FECHAREGISTRO', 'TPIM_REGISTRADOPOR', 
    'ESTADO_ESTA_ID']; 
}
