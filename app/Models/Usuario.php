<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "usuario";
    public $timestamps = false;

    protected $fillable = ['USUA_NOMBRES', 'USUA_APELLIDOS', 'USUA_NUMERODOCUMENTO',
        'USUA_CORREO', 'USUA_DIRECCION', 'USUA_NUMEROCELULAR', 'USUA_FOTO','USUA_FECHANACIMIENTO',
        'USUA_PASSWORD', 'CIUDAD_CIUD_ID', 'ESTADO_ESTA_ID', 'ROL_ROL_ID', 'TIPO_DOCUMENTO_TIDO_ID'];
    //protected $guarded=['ROL_ROL_ID'];

    protected function setUsuaPasswordAttribute(string $Password)
    {
        $this->attributes['USUA_PASSWORD'] = password_hash($Password, PASSWORD_BCRYPT);
    }
}
