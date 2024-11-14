<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Objetivos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivosController extends Controller
{
    public function __invoke()
    {

        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        return view('User.Objetivos', compact('Estados'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_objetivo' => 'required',
            'sel_estado_nuevo_objetivo' => 'required|numeric',
        ]);

        $Objetivos = Objetivos::all()->where('OBJE_NOMBRE', '=', $request->txt_nombre_nuevo_objetivo);
        if ($Objetivos != null && count($Objetivos) > 0) {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups el Objetivo ya existe',
            ];
            return back()->with($msg);
        } else {

        $Objetivos = new Objetivos();
        $Objetivos->OBJE_NOMBRE = $request->txt_nombre_nuevo_objetivo;
        $Objetivos->OBJE_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Objetivos->ESTADO_ESTA_ID = $request->sel_estado_nuevo_objetivo;
        if ($Objetivos->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El objetivo se  registro satisfactoriamente',
            ];
            return redirect()->route('ObjetivosUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información del objetivo',
            ];
            return back()->with($msg);
        }
    }
}

    public function ConsultaAll()
    {
        $Objetivos = Objetivos::select('OBJE_ID', 'OBJE_NOMBRE', 'ESTADO_ESTA_ID', 'ESTA_TIPO')
            ->join('estado', 'objetivos.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->get();

        return datatables()->of($Objetivos)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'txt_obje_id_editar' => 'required|numeric',
            'txt_nombre_editar_objetivo' => 'required',
            'sel_estado_editar_objetivo' => 'required',
        ]);

        $Objetivos = Objetivos::findOrFail($request->txt_obje_id_editar);
        $Objetivos->OBJE_NOMBRE = $request->txt_nombre_editar_objetivo;
        $Objetivos->OBJE_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Objetivos->ESTADO_ESTA_ID = $request->sel_estado_editar_objetivo;

        if ($Objetivos->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El objetivo se Actualizo satisfactoriamente',
            ];
            return redirect()->route('ObjetivosUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información del objetivo',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_obje_id_eliminar' => 'required|numeric',
        ]);

        $Objetivos = Objetivos::findOrFail($request->txt_obje_id_eliminar);
        $Objetivos->ESTADO_ESTA_ID = "4";
        if ($Objetivos->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El objetivo fue Eliminado satisfactoriamente',
            ];
            return redirect()->route('ObjetivosUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el objetivo',
            ];
            return back()->with($msg);
        }
    }
}
