<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = "proveedor";
    public $timestamps = false;
    protected $primaryKey = 'PROV_ID';
    protected $fillable = ['PROV_ID', 'PROV_NOMBRE', 'PROV_NIT',
        'PROV_DIRECCION', 'PROV_TELEFONO', 'PROV_CORREO', 'PROV_CELULAR', 'TIPO_DOCUMENTO_TIDO_ID',
        'CIUDAD_CIUD_ID', 'ESTADO_ESTA_ID', 'PROV_REGISTRADOPOR', 'PROV_FECHAREGISTRO'];
}
