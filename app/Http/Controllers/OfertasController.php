<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\GrupoSabores;
use App\Models\Ofertas;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OfertasController extends Controller
{
    public function __invoke()
    {
        return view('User.Ofertas');
    }
    public function ConsultaAll()
    {
        // $Ofertas = Ofertas::select(
        //     'OFER_ID',
        //     'OFER_FECHAINICIO',
        //     'OFER_FECHAFIN',
        //     'OFER_DESCUENTO',
        //     'oferta.ESTADO_ESTA_ID',
        //     'UNME_MEDIDA',
        //     'GRSA_PRECIO',
        //     'PROD_NOMBRE',
        //     'PROD_COMPLEMENTO',
        //     'ESTA_TIPO'
        // )
        //     ->join('grupo_sabores', 'oferta.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
        //     ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
        //     ->join('producto', 'grupo_sabores.PRODUCTO_PROD_ID', '=', 'producto.PROD_ID')
        //     ->join('estado', 'oferta.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
        //     ->where('ESTA_TIPO', '!=', 'Eliminado')
        //     ->get();

        $Ofertas = DB::table('oferta')
            ->select(DB::raw('
            OFER_ID,
            OFER_FECHAINICIO,
            OFER_FECHAFIN,
            OFER_DESCUENTO,
            oferta.ESTADO_ESTA_ID,
            UNME_MEDIDA,
            GRSA_PRECIO,
            PROD_NOMBRE,
            CASE WHEN PROD_COMPLEMENTO IS NOT NULL THEN PROD_COMPLEMENTO
            ELSE " " END COMPLEMENTO,
            ESTA_TIPO,
            (GRSA_PRECIO-(GRSA_PRECIO * (OFER_DESCUENTO / 100))) AS "DESCUENTO"
             '))
            ->join('grupo_sabores', 'oferta.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
            ->join('producto', 'grupo_sabores.PRODUCTO_PROD_ID', '=', 'producto.PROD_ID')
            ->join('estado', 'oferta.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->get();
        return datatables()->of($Ofertas)->toJson();
    }
    public function index(Request $request)
    {
        $Tipo = $request->Tipo;
        $Oferta = null;
        $GrupoSabores = null;
        if ($Tipo != null && $Tipo === 'Modificar') {
            $Oferta = Ofertas::findOrFail($request->OFER_ID);
            $GrupoSabores = GrupoSabores::findOrFail($Oferta->GRUPO_SABORES_GRSA_ID);
        } else {
            $Tipo = null;
        }

        $Estados = Estado::all()->where('ESTA_TIPO', '!=', 'Eliminado');
        $Productos = Producto::all()->where('ESTADO_ESTA_ID', '=', '1')->sortBy("PROD_NOMBRE");
        return view('User.OfertaNueva', compact('Estados', 'Productos', 'Tipo', 'Oferta', 'GrupoSabores'));
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'sel_presentacion_nuevo_ofertas' => 'required|numeric',
            'num_descuento_nuevo_ofertas' => 'required|numeric',
            'sel_estado_nuevo_ofertas' => 'required|numeric',
            'date_fechaInicio_ofertas' => 'required',
            'date_fechaFin_ofertas' => 'required',
        ]);

        $Encuentra = false;
        $Oferta = Ofertas::all()
            ->where('GRUPO_SABORES_GRSA_ID', '=', $request->sel_presentacion_nuevo_ofertas)
            ->where('ESTADO_ESTA_ID', '=', '1');
        if ($Oferta != null && $Oferta != '' && count($Oferta) > 0) {
            foreach ($Oferta as $fila) {
                $Encuentra = true;
            }
        }
        if ($Encuentra) {
            $msg = [
                'MsgErrorPassword' => null,
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'La oferta ya existe',
            ];
            return back()->with($msg);
        } else {
            $Oferta = new Ofertas();
            $Oferta->OFER_FECHAINICIO = $request->date_fechaInicio_ofertas;
            $Oferta->OFER_FECHAFIN = $request->date_fechaFin_ofertas;
            $Oferta->OFER_DESCUENTO = $request->num_descuento_nuevo_ofertas;
            $Oferta->OFER_REGISTRADOPOR = auth()->user()->USUA_ID;
            $Oferta->GRUPO_SABORES_GRSA_ID = $request->sel_presentacion_nuevo_ofertas;
            $Oferta->ESTADO_ESTA_ID = $request->sel_estado_nuevo_ofertas;
            if ($Oferta->save()) {
                $msg = [
                    'message' => 'Exitoso',
                    'RespuestaExito' => 'La oferta se  registro satisfactoriamente',
                ];
                return redirect()->route('OfertasUser')->with($msg);
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la oferta',
                ];
                return back()->with($msg);
            }
        }
    }

    public function Modificar(Request $request)
    {
        
        $request->validate([
            'OFER_ID' => 'required|numeric',
            'sel_presentacion_nuevo_ofertas' => 'required|numeric',
            'num_descuento_nuevo_ofertas' => 'required|numeric',
            'sel_estado_nuevo_ofertas' => 'required|numeric',
            'date_fechaInicio_ofertas' => 'required',
            'date_fechaFin_ofertas' => 'required',
        ]);

        $Oferta = Ofertas::findOrFail($request->OFER_ID);
        $Oferta->OFER_FECHAINICIO = $request->date_fechaInicio_ofertas;
        $Oferta->OFER_FECHAFIN = $request->date_fechaFin_ofertas;
        $Oferta->OFER_DESCUENTO = $request->num_descuento_nuevo_ofertas;
        $Oferta->OFER_REGISTRADOPOR = auth()->user()->USUA_ID;
        $Oferta->GRUPO_SABORES_GRSA_ID = $request->sel_presentacion_nuevo_ofertas;
        $Oferta->ESTADO_ESTA_ID = $request->sel_estado_nuevo_ofertas;

        if ($Oferta->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La oferta se Actualizo satisfactoriamente',
            ];
            return redirect()->route('OfertasUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la oferta',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_ofer_id_eliminar' => 'required|numeric',
        ]);
        $Oferta = Ofertas::findOrFail($request->txt_ofer_id_eliminar);
        $Oferta->ESTADO_ESTA_ID = "4";
        if ($Oferta->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La oferta fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('OfertasUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar la oferta',
            ];
            return back()->with($msg);
        }
    }
}
