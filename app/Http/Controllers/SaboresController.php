<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\GrupoSabores;
use App\Models\Sabores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaboresController extends Controller
{
    public function __invoke()
    {

        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        return view('User.Sabores', compact('Estados'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_sabor' => 'required',
            'sel_estado_nuevo_sabor' => 'required',
        ]);

        $Sabores = Sabores::all()->where('SABO_DESCRIPCION', '=', $request->txt_nombre_nuevo_sabor);
        if ($Sabores != null && count($Sabores) > 0) {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups el Sabor ya existe',
            ];
            return back()->with($msg);
        } else {

            $Sabores = new Sabores();
            $Sabores->SABO_DESCRIPCION = $request->txt_nombre_nuevo_sabor;
            $Sabores->SABO_REGISTRADOPOR = auth()->user()->USUA_ID;
            $Sabores->ESTADO_ESTA_ID = $request->sel_estado_nuevo_sabor;
            if ($Sabores->save()) {

                $msg = [
                    'message' => 'Exitoso',
                    'RespuestaExito' => 'Sabor registrado satisfactoriamente',
                ];
                return redirect()->route('SaboresUser')->with($msg);
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información del Sabor',
                ];
                return back()->with($msg);
            }
        }
    }

    public function ConsultaAll()
    {
        $sabores = Sabores::select('SABO_ID', 'SABO_DESCRIPCION', 'ESTADO_ESTA_ID', 'ESTA_TIPO')  
            ->join('estado', 'sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->orderBy('SABO_DESCRIPCION', 'asc')
            ->get();

        return datatables()->of($sabores)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'txt_sabo_id_editar' => 'required|numeric',
            'txt_nombre_editar_sabor' => 'required',
            'sel_estado_editar_sabor' => 'required',
        ]);

        $Sabores = Sabores::findOrFail($request->txt_sabo_id_editar);
        $Sabores->SABO_DESCRIPCION = $request->txt_nombre_editar_sabor;
        $Sabores->SABO_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Sabores->ESTADO_ESTA_ID = $request->sel_estado_editar_sabor;

        if ($Sabores->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El sabor se Actualizo satisfactoriamente',
            ];
            return redirect()->route('SaboresUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información del sabor',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_sabo_id_eliminar' => 'required|numeric',
        ]);

        $Sabores = Sabores::findOrFail($request->txt_sabo_id_eliminar);
        $Sabores->ESTADO_ESTA_ID = "4";
        if ($Sabores->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El sabor fue Eliminado satisfactoriamente',
            ];
            return redirect()->route('SaboresUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el sabor',
            ];
            return back()->with($msg);
        }
    }


    public function BuscarSaboresPresentaciones(Request $request)
    {
        $Prod_id = $request->Prod_id;
        $Unme_id = $request->Unme_id;
        $GrupoSabores = GrupoSabores::select(
            'UNME_ID',
            'GRSA_ID',
            'ESTA_TIPO',
            'UNIDAD_MEDIDA_UNME_ID',
            'UNME_MEDIDA',
            'grupo_sabores.PRODUCTO_PROD_ID',
            'grupo_sabores.ESTADO_ESTA_ID',
            'sabores.SABO_DESCRIPCION',
            'sabores.SABO_ID'
        )
            ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
            ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
            ->where('estado.ESTA_TIPO', '=', 'Activo')
            ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $Prod_id)
            ->where('unidad_medida.UNME_ID', '=', $Unme_id)
            ->orderBy('SABO_DESCRIPCION', 'ASC')
            ->orderBy('UNME_MEDIDA', 'ASC')
            ->get();
        
        return response(json_encode($GrupoSabores), 200)->header('Content-type', 'text/plain');
    }
    
}
