<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = "ciudad";
    public $timestamps = false;
    protected $fillable = ['CIUD_ID ', 'CIUD_DESCRIPCION', 'CIUD_REGISTRADOPOR',
        'CIUD_FECHAREGISTRO', 'DEPARTAMENTO_DEPA_ID','ESTADO_ESTA_ID'];

        

}
