<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = "detalle_compras";
    public $timestamps = false;
    protected $primaryKey = 'DECO_ID';
    protected $fillable = ['DECO_ID', 'DECO_PRECIO','DECO_CODIGOBARRAS','DECO_CANTIDAD','DECO_FECHAVENCIMIENTO',
        'DECO_FECHAREGISTRO','GRUPO_SABORES_GRSA_ID','COMPRAS_COMP_ID']; 
}
