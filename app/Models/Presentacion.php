<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;
    protected $table = "unidad_medida";
    public $timestamps = false;
    protected $primaryKey = 'UNME_ID';
    protected $fillable = ['UNME_ID', 'UNME_MEDIDA','UNME_REGISTRADOPOR', 'UNME_FECHAREGISTRO',
        'ESTADO_ESTA_ID']; 
}
