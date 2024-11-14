<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoObjetivos extends Model
{
    use HasFactory;
    protected $table = "producto_objetivos";
    public $timestamps = false;
    protected $primaryKey = 'PROB_ID';
    protected $fillable = ['PROB_ID', 'PROB_REGISTRADOPOR','PROB_FECHAREGISTRO', 'PRODUCTO_PROD_ID',
        'OBJETIVOS_OBJE_ID', 'ESTADO_ESTA_ID'];
}
