<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = "categoria";
    public $timestamps = false;
    protected $primaryKey = 'CATE_ID';
    protected $fillable = ['CATE_ID', 'CATE_NOMBRE','CATE_DESCRIPCION','CATE_IMAGEN','CATE_REGISTRADAPOR',
        'CATE_FECHAREGISTRO','ESTADO_ESTA_ID']; 
}
