<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $table = "tipo_documento";
    public $timestamps = false;
    protected $fillable = ['TIDO_ID ', 'TIDO_DESCRIPCION', 'TIDO_REGISTRADOPOR',
        'TIDO_FECHAREGISTRO'];


}
