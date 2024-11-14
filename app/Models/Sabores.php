<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sabores extends Model
{
    use HasFactory;
    protected $table = "sabores";
    public $timestamps = false;
    protected $primaryKey = 'SABO_ID';
    protected $fillable = ['SABO_ID', 'SABO_DESCRIPCION','SABO_REGISTRADOPOR', 'SABO_FECHAREGISTRO',
        'ESTADO_ESTA_ID']; 
}
