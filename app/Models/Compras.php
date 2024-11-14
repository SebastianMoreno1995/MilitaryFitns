<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $table = "compras";
    public $timestamps = false;
    protected $primaryKey = 'COMP_ID';
    protected $fillable = ['COMP_ID', 'COMP_DESCUENTO','COMP_FEHCACOMPRA','COMP_REGISTRADOPOR','COMP_FECHAREGISTRO',
        'TIPO_IMPUESTO_TPIM_ID','PROVEEDOR_PROV_ID','ESTADO_ESTA_ID']; 
}
