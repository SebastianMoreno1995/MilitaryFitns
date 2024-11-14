<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "usuario";
    public $timestamps = false;
    protected $primaryKey = "USUA_ID";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $fillable = ['USUA_ID','USUA_NOMBRES', 'USUA_APELLIDOS', 'USUA_NUMERODOCUMENTO',
        'USUA_CORREO', 'USUA_DIRECCION', 'USUA_NUMEROCELULAR', 'USUA_FECHANACIMIENTO','USUA_FOTO',
        'USUA_PASSWORD', 'CIUDAD_CIUD_ID', 'ESTADO_ESTA_ID', 'ROL_ROL_ID', 'TIPO_DOCUMENTO_TIDO_ID'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'USUA_PASSWORD',
        'REMEMBER_TOKEN',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->USUA_PASSWORD;
    }
    protected function setUsuaPasswordAttribute(string $Password)
    {
        $this->attributes['USUA_PASSWORD'] = password_hash($Password, PASSWORD_BCRYPT);
    }
}
