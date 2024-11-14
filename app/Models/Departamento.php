<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = "departamento";
    public $timestamps = false;
    protected $fillable = ['DEPA_ID ', 'DEPA_DESCRIPCION', 'DEPA_REGISTRADOPOR',
        'DEPA_FECHAREGISTRO','ESTADO_ESTA_ID'];


}
