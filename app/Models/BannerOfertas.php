<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerOfertas extends Model
{
    use HasFactory;
    protected $table = "banner";
    public $timestamps = false;
    protected $primaryKey = 'BANN_ID';
    protected $fillable = ['BANN_ID', 'BANN_DESCRIPCION','BANN_REGISTRADOPOR', 'BANN_FECHAREGISTRO',
        'OFERTA_OFER_ID','ESTADO_ESTA_ID','IMAGENES_IMAG_ID']; 
}
