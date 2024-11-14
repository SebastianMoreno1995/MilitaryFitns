<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    use HasFactory;
    protected $table = "oferta";
    public $timestamps = false;
    protected $primaryKey = 'OFER_ID';
    protected $fillable = ['OFER_ID', 'OFER_FECHAINICIO','OFER_FECHAFIN','OFER_DESCUENTO','OFER_REGISTRADOPOR','OFER_FECHAREGISTRO',
        'GRUPO_SABORES_GRSA_ID','ESTADO_ESTA_ID']; 
}
