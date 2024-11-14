<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;
    protected $table = "marcas";
    public $timestamps = false;
    protected $primaryKey = 'MARC_ID';
    protected $fillable = ['MARC_ID', 'MARC_NOMBRE', 'MARC_IMAGEN','MARC_REGISTRADOPOR', 'MARC_FECHAREGISTRO',
        'ESTADO_ESTA_ID']; 
}
