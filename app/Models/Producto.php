<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "producto";
    public $timestamps = false;
    protected $primaryKey = 'PROD_ID';
    protected $fillable = ['PROD_ID', 'PROD_NOMBRE','PROD_COMPLEMENTO', 'PROD_DESCRIPCION',
        'PROD_REGISTROINVIMA','PROD_ADVERTENCIA','PROD_CODIGOBARRAS','PROD_REGISTRADOPOR','PROD_FECHAREGISTRO',
        'SUBCATEGORIA_SUBC_ID', 'MARCA_MARC_ID','ESTADO_ESTA_ID']; 
}
