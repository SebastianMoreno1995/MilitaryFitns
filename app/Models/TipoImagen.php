<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImagen extends Model
{
    use HasFactory;
    protected $table = "tipo_imagen";
    public $timestamps = false;
    protected $primaryKey = 'TIIM_ID';
    protected $fillable = ['TIIM_ID', 'TIIM_DESCRIPCION','TIIM_REGISTRADOPOR', 'TIIM_FECHAREGISTRO']; 
}
