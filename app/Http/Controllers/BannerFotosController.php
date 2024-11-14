<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Imagenes;
use App\Models\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BannerFotosController extends Controller
{
    public function __invoke()
    {

        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        return view('User.FotosBanner', compact('Estados'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_fotoBanner' => 'required',
            'sel_estado_nuevo_fotoBanner' => 'required|numeric',
            'input_file_nuevo' => 'required|image',
            'txt_imagen_nuevo_fotoBanner' => 'required',
        ]);

        $Imagenes = Imagenes::all()->where('IMAG_NOMBRE', '=', $request->txt_nombre_nuevo_fotoBanner);
        if ($Imagenes != null && count($Imagenes) > 0) {
            $msg = [
                'MsgErrorPassword' => null,
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'El banner ya existe',
            ];
            return back()->with($msg);
        } else {
            $Imagenes = new Imagenes();
            $Imagenes->IMAG_NOMBRE = $request->txt_nombre_nuevo_fotoBanner;
            $Imagenes->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
            $Imagenes->ESTADO_ESTA_ID = $request->sel_estado_nuevo_fotoBanner;
            $Imagenes->TIPO_IMAGEN_TIIM_ID = '4';
            $Imagenes->IMAG_DIRECCIONIMAGEN = 'Cargando';
            if ($Imagenes->save()) {
                $destinoImagen = 'img/banner/';
                $file = $request->file('input_file_nuevo');
                $filename = 'Bann_' . $Imagenes->IMAG_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_nuevo')->move($destinoImagen, $filename)) {
                    $ImagenesImg = Imagenes::findOrFail($Imagenes->IMAG_ID);
                    $ImagenesImg->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filename;
                    if ($ImagenesImg->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Imagen registrada satisfactoriamente',
                        ];
                        return redirect()->route('FotosBannerUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la imagen',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen',
                    ];
                    return back()->with($msg);
                }
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la imagen',
                ];
                return back()->with($msg);
            }
        }
    }

    public function ConsultaAll()
    {
        $Imagenes = Imagenes::select(
            'IMAG_ID',
            'IMAG_NOMBRE',
            'IMAG_DIRECCIONIMAGEN',
            'TIPO_IMAGEN_TIIM_ID',
            'ESTADO_ESTA_ID',
            'ESTA_TIPO'
        )
            ->join('estado', 'imagenes.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->where('TIPO_IMAGEN_TIIM_ID', '=', '4')
            ->get();

        return datatables()->of($Imagenes)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'txt_fotoBanner_id_editar' => 'required|numeric',
            'txt_nombre_editar_fotoBanner' => 'required',
            'sel_estado_editar_fotoBanner' => 'required',
            'txt_imagen_editar_fotoBanner' => 'required',
        ]);

        $Imagenes = Imagenes::findOrFail($request->txt_fotoBanner_id_editar);
        $Imagenes->IMAG_NOMBRE = $request->txt_nombre_editar_fotoBanner;
        $Imagenes->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Imagenes->ESTADO_ESTA_ID = $request->sel_estado_editar_fotoBanner;
        if ($Imagenes->IMAG_DIRECCIONIMAGEN != null && $Imagenes->IMAG_DIRECCIONIMAGEN != '') {
            if ($request->txt_imagen_editar_fotoBanner === $Imagenes->IMAG_DIRECCIONIMAGEN) {
                if ($Imagenes->save()) {
                    $msg = [
                        'message' => 'Exitoso',
                        'RespuestaExito' => 'La imagen se Actualizo satisfactoriamente',
                    ];
                    return redirect()->route('FotosBannerUser')->with($msg);
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la imagen',
                    ];
                    return back()->with($msg);
                }
            } else {
                $request->validate([
                    'input_file_editar' => 'required|image',
                ]);

                try {
                    unlink(public_path($Imagenes->IMAG_DIRECCIONIMAGEN));
                } catch (\Throwable $th) {
                    //throw $th;
                }

                $destinoImagen = 'img/banner/';
                $file = $request->file('input_file_editar');
                $filename = 'Bann_' . $Imagenes->IMAG_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_editar')->move($destinoImagen, $filename)) {
                    $Imagenes->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filename;
                    if ($Imagenes->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Imagen Actualizada satisfactoriamente',
                        ];
                        return redirect()->route('FotosBannerUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la imagen',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Modificar la imagen',
                    ];
                    return back()->with($msg);
                }
            }
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_fotoBanner_id_eliminar' => 'required|numeric',
        ]);

        $Imagenes = Imagenes::findOrFail($request->txt_fotoBanner_id_eliminar);
        
        try {
            unlink(public_path($Imagenes->IMAG_DIRECCIONIMAGEN));
        } catch (\Throwable $th) {
            //throw $th;
        }

        if ($Imagenes->delete()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La Imagen fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('FotosBannerUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar la imagen',
            ];
            return back()->with($msg);
        }
    }
}
