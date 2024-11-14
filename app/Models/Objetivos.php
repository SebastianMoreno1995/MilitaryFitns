<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivos extends Model
{
    use HasFactory;
    protected $table = "objetivos";
    public $timestamps = false;
    protected $primaryKey = 'OBJE_ID';
    protected $fillable = ['OBJE_ID', 'OBJE_NOMBRE', 'OBJE_REGISTRADOPOR','OBJE_FECHAREGISTRO',
        'ESTADO_ESTA_ID']; 
}
