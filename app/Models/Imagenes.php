<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $table = "imagenes";
    public $timestamps = false;
    protected $primaryKey = 'IMAG_ID';
    protected $fillable = ['IMAG_ID', 'IMAG_NOMBRE','IMAG_DIRECCIONIMAGEN','IMAG_REGISTRADOPOR', 'IMAG_FECHAREGISTRO', 'TIPO_IMAGEN_TIIM_ID',
        'PRODUCTO_PROD_ID','ESTADO_ESTA_ID','GRUPO_SABORES_GRSA_ID']; 
}
