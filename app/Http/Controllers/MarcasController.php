<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcasController extends Controller
{
    public function __invoke()
    {

        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        return view('User.Marcas', compact('Estados'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_marca' => 'required',
            'sel_estado_nuevo_marca' => 'required|numeric',
            'input_file_nuevo' => 'required|image',
            'txt_imagen_nuevo_marca' => 'required',
        ]);

        $Marcas = Marcas::all()->where('MARC_NOMBRE', '=', $request->txt_nombre_nuevo_marca);
        if ($Marcas != null && count($Marcas) > 0) {
            $msg = [
                'MsgErrorPassword' => null,
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'La marca ya existe',
            ];
            return back()->with($msg);
        } else {
            $Marcas = new Marcas();
            $Marcas->MARC_NOMBRE = $request->txt_nombre_nuevo_marca;
            $Marcas->MARC_REGISTRADOPOR = auth()->user()->USUA_ID;
            $Marcas->ESTADO_ESTA_ID = $request->sel_estado_nuevo_marca;
            $Marcas->MARC_IMAGEN = 'Cargando';
            if ($Marcas->save()) {
                $destinoImagen = 'img/marcas/';
                $file = $request->file('input_file_nuevo');
                $filename = 'Marc_' . $Marcas->MARC_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_nuevo')->move($destinoImagen, $filename)) {
                    $MarcasImg = Marcas::findOrFail($Marcas->MARC_ID);
                    $MarcasImg->MARC_IMAGEN = $destinoImagen . $filename;
                    if ($MarcasImg->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Marca registrada satisfactoriamente',
                        ];
                        return redirect()->route('MarcasUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Marca',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen de la marca',
                    ];
                    return back()->with($msg);
                }
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la marca',
                ];
                return back()->with($msg);
            }
        }
    }

    public function ConsultaAll()
    {
        $Marcas = Marcas::select('MARC_ID', 'MARC_NOMBRE', 'MARC_IMAGEN', 'ESTADO_ESTA_ID', 'ESTA_TIPO')
            ->join('estado', 'Marcas.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->orderBy('MARC_NOMBRE', 'ASC')
            ->get();

        return datatables()->of($Marcas)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'txt_marc_id_editar' => 'required|numeric',
            'txt_nombre_editar_marca' => 'required',
            'sel_estado_editar_marca' => 'required',
            'txt_imagen_editar_marca' => 'required',
        ]);

        $Marcas = Marcas::findOrFail($request->txt_marc_id_editar);
        $Marcas->MARC_NOMBRE = $request->txt_nombre_editar_marca;
        $Marcas->MARC_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Marcas->ESTADO_ESTA_ID = $request->sel_estado_editar_marca;
        if ($Marcas->MARC_IMAGEN != null && $Marcas->MARC_IMAGEN != '') {
            if ($request->txt_imagen_editar_marca === $Marcas->MARC_IMAGEN) {
                if ($Marcas->save()) {
                    $msg = [
                        'message' => 'Exitoso',
                        'RespuestaExito' => 'La marca se Actualizo satisfactoriamente',
                    ];
                    return redirect()->route('MarcasUser')->with($msg);
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la marca',
                    ];
                    return back()->with($msg);
                }
            } else {
                $request->validate([
                    'input_file_editar' => 'required|image',
                ]);

                unlink(public_path($Marcas->MARC_IMAGEN));
                $destinoImagen = 'img/marcas/';
                $file = $request->file('input_file_editar');
                $filename = 'Marc_' . $Marcas->MARC_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_editar')->move($destinoImagen, $filename)) {
                    $Marcas->MARC_IMAGEN = $destinoImagen . $filename;
                    if ($Marcas->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Marca Actualizada satisfactoriamente',
                        ];
                        return redirect()->route('MarcasUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la Marca',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Modificar la imagen de la marca',
                    ];
                    return back()->with($msg);
                }
            }
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_marc_id_eliminar' => 'required|numeric',
        ]);

        $Marcas = Marcas::findOrFail($request->txt_marc_id_eliminar);
        $Marcas->ESTADO_ESTA_ID = "4";
        if ($Marcas->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La marca fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('MarcasUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar la marca',
            ];
            return back()->with($msg);
        }
    }
}
