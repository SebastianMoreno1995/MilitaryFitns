<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSabores extends Model
{
    use HasFactory;
    protected $table = "grupo_sabores";
    public $timestamps = false;
    protected $primaryKey = 'GRSA_ID';
    protected $fillable = ['GRSA_ID', 'GRSA_DESCRIPCION', 'GRSA_STOCK', 'GRSA_STOCKMINIMO',	'GRSA_PRECIO',
        'GRSA_REGISTRADOPOR', 'SABORES_SABO_ID', 'ESTADO_ESTA_ID', 'PRODUCTO_PROD_ID', 'UNIDAD_MEDIDA_UNME_ID'];
}
