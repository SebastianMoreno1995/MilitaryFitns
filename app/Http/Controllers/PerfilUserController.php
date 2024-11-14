<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioValidate;
use App\Models\Departamento;
use App\Models\TipoDocumento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PerfilUserController extends Controller
{
    public function __invoke()
    {
        $TipoDoc = TipoDocumento::all()->where('ESTADO_ESTA_ID', '=', '1');
        $Departamento = Departamento::all()->where('ESTADO_ESTA_ID', '=', '1');
        $MasDatos = User::join('ciudad', 'usuario.CIUDAD_CIUD_ID', '=', 'ciudad.CIUD_ID')
            ->join('departamento', 'ciudad.DEPARTAMENTO_DEPA_ID', '=', 'departamento.DEPA_ID')
            ->where('usuario.USUA_ID', auth()->user()->USUA_ID)
            ->get();
        // ->orWhere('departamento.ESTADO_ESTA_ID', '=', '1')
        return view('User.Perfil', compact('TipoDoc', 'Departamento', 'MasDatos'));
    }
    public function Actualizar(UsuarioValidate $request)
    {
        $Usuario = User::findOrFail(auth()->user()->USUA_ID);
        $Usuario->USUA_NOMBRES = $request->txt_nombre;
        $Usuario->USUA_APELLIDOS = $request->txt_apellido;
        $Usuario->USUA_NUMERODOCUMENTO = $request->num_documento;
        $Usuario->USUA_CORREO = $request->txt_correo;
        $Usuario->USUA_DIRECCION = $request->txt_direccion;
        $Usuario->USUA_NUMEROCELULAR = $request->num_telefono;
        $Usuario->USUA_FECHANACIMIENTO = $request->date_fechaNacimiento;
        $Usuario->CIUDAD_CIUD_ID = $request->txt_municipio;
        $Usuario->TIPO_DOCUMENTO_TIDO_ID = $request->txt_tipoDocumento;

        if ($Usuario->save()) {
            Auth::login($Usuario);
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'Los datos se actualizaron
                satisfactoriamente',
            ];
            return redirect()->route('PerfilUser')->with($msg);
        } else {
            // return 'NO correcto';
            $msg = [
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar los datos',
            ];
            return back()->with($msg);
        }
    }

    public function ActualizarPassword(Request $request)
    {
        $rules = [
            'txt_passwordAntiguo' => 'required',
            'txt_password1' => 'required|min:8',
            'txt_password2' => 'required|min:8|same:txt_password1',
        ];
        $messages = [
            'txt_passwordAntiguo.required' => 'Ingrese una contraseña.',
            'txt_password1.required' => 'Ingrese una contraseña.',
            'txt_password1.min' => 'Su contraseña es demasiado corta.',
            'txt_password2.required' => 'Repita la contraseña.',
        ];
        $this->validate($request, $rules, $messages);
        $PasswordOld = $request->txt_passwordAntiguo;
        $PasswordNew = $request->txt_password2;
        $oldPassword = User::find(auth()->user()->USUA_ID)->USUA_PASSWORD;
        $equals = Hash::check($PasswordOld, $oldPassword);
        if ($equals) {
            $Usuario = User::findOrFail(auth()->user()->USUA_ID);
            $Usuario->USUA_PASSWORD = $PasswordNew;
            if ($Usuario->save()) {
                Auth::login($Usuario);
                $msg = [
                    'messagePassword' => 'Exitoso',
                    'RespuestaPassword' => 'La contraseña fue cambiada
                    satisfactoriamente',
                ];
                return redirect()->route('PerfilUser')->with($msg);
            } else {
                $msg = [
                    'MsgErrorPassword' => null,
                    'MsgErrorSistema' => 'ErrorSistema',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la Contraseña',
                ];
                return back()->with($msg);
            }
        } else {
            $msg = [
                'MsgErrorSistema' => null,
                'MsgErrorPassword' => 'Error',
                'RespuestaErrorPassword' => 'La contraseña antigua no coincide con la ya registrada',
            ];
            return back()->with($msg);
        }
    }

    public function ActualizarFotoPerfil(Request $request)
    {
        $request->validate([
            'file_FotoUser' => 'required|image',
        ]);
        $Usuario = User::find(auth()->user()->USUA_ID);
        $ruta = '../public/img/avatar/User_' . $Usuario->USUA_ID;

        if (!File::isDirectory($ruta)) {
            //Crea la Carpeta de la imagen de usuario
            File::makeDirectory($ruta, 0777, true);
        }
        $destinoImagen = 'img/avatar/User_' . $Usuario->USUA_ID . '/';
        $file = $request->file('file_FotoUser');
        //$filename = time().'-'.$file->getClientOriginalName();
        $filename = 'User_' . $Usuario->USUA_ID . '-' . time() . '.' . $file->getClientOriginalExtension();

        if ($Usuario->USUA_FOTO != null && $Usuario->USUA_FOTO != '') {
            //Storage::disk('public')->delete('/img/avatar/User_1/User_1-1642297912.png')
            try {
                unlink(public_path($Usuario->USUA_FOTO));
            } catch (\Throwable$th) {
                //throw $th;
            }

        }

        if ($request->file('file_FotoUser')->move($destinoImagen, $filename)) {
            $Usuario->USUA_FOTO = $destinoImagen . $filename;
            if ($Usuario->save()) {
                Auth::login($Usuario);
                $msg = [
                    'messageFoto' => 'Exitoso',
                    'RespuestaExito' => 'La imagen se actualizó satisfactoriamente',
                ];
                // return redirect()->route('PerfilUser')->with($msg);
                return back()->with($msg);

            } else {
                $msg = [
                    'MsgErrorPassword' => null,
                    'MsgErrorSistema' => 'ErrorSistema',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la foto de perfil',
                ];
                return back()->with($msg);
            }
        } else {
            //ERROR AL MOVER LA IMAGEN
            $msg = [
                'MsgErrorPassword' => null,
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'Ups se presentó un error al mover la imagen',
            ];
            return back()->with($msg);
        }

    }
}
