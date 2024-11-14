<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorias extends Model
{
    use HasFactory;
    protected $table = "subcategoria";
    public $timestamps = false;
    protected $primaryKey = 'SUBC_ID';
    protected $fillable = ['SUBC_ID', 'SUBC_NOMBRE','SUBC_DESCRIPCION', 'SUBC_REGISTRADOPOR',
        'SUBC_FECHAREGISTRO', 'CATEGORIA_CATE_ID', 'ESTADO_ESTA_ID'];
}
