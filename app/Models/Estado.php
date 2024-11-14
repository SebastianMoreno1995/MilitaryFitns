<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = "estado";
    public $timestamps = false;
    protected $fillable = ['ESTA_ID', 'ESTA_TIPO', 'ESTA_REGISTRADOPOR',
        'ESTA_FECHAREGISTRO'];


}
