<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\GrupoSabores;
use App\Models\Presentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresentacionController extends Controller
{
    public function __invoke()
    {

        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        return view('User.Presentacion', compact('Estados'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_presentacion' => 'required',
            'sel_estado_nuevo_presentacion' => 'required|numeric',
        ]);

        $Presentacion = Presentacion::all()->where('UNME_MEDIDA', '=', $request->txt_nombre_nuevo_presentacion);
        if ($Presentacion != null && count($Presentacion) > 0) {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups la Presentacion ya existe',
            ];
            return back()->with($msg);
        } else {

            $Presentacion = new Presentacion();
            $Presentacion->UNME_MEDIDA = $request->txt_nombre_nuevo_presentacion;
            $Presentacion->UNME_REGISTRADOPOR = auth()->user()->USUA_ID;
            $Presentacion->ESTADO_ESTA_ID = $request->sel_estado_nuevo_presentacion;
            if ($Presentacion->save()) {
                $msg = [
                    'message' => 'Exitoso',
                    'RespuestaExito' => 'Presentación registrada satisfactoriamente',
                ];
                return redirect()->route('PresentacionUser')->with($msg);
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Presentación',
                ];
                return back()->with($msg);
            }
        }
    }

    public function ConsultaAll()
    {
        $Presentacion = Presentacion::select('UNME_ID', 'UNME_MEDIDA', 'ESTADO_ESTA_ID', 'ESTA_TIPO')
            ->join('estado', 'unidad_medida.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->get();

        return datatables()->of($Presentacion)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'txt_pres_id_editar' => 'required|numeric',
            'txt_nombre_editar_presentacion' => 'required',
            'sel_estado_editar_presentacion' => 'required',
        ]);

        $Presentacion = Presentacion::findOrFail($request->txt_pres_id_editar);
        $Presentacion->UNME_MEDIDA = $request->txt_nombre_editar_presentacion;
        $Presentacion->UNME_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Presentacion->ESTADO_ESTA_ID = $request->sel_estado_editar_presentacion;

        if ($Presentacion->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La Presentación se Actualizo satisfactoriamente',
            ];
            return redirect()->route('PresentacionUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la Presentación',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_pres_id_eliminar' => 'required|numeric',
        ]);

        $Presentacion = Presentacion::findOrFail($request->txt_pres_id_eliminar);
        $Presentacion->ESTADO_ESTA_ID = "4";
        if ($Presentacion->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La Presentación fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('PresentacionUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar la Presentación',
            ];
            return back()->with($msg);
        }
    }

    public function CostoPresentacionProducto(Request $request)
    {
        $Grsa_id = $request->Grsa_id;
        $GrupoSabores = GrupoSabores::select(
            'GRSA_ID',
            'GRSA_PRECIO',
            'GRSA_STOCKMINIMO'
        )
            ->where('grupo_sabores.GRSA_ID', '=', $Grsa_id)
            ->get();
        return response(json_encode($GrupoSabores), 200)->header('Content-type', 'text/plain');
    }
}
