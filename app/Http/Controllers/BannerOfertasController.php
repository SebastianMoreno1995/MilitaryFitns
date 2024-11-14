<?php

namespace App\Http\Controllers;

use App\Models\BannerOfertas;
use App\Models\Estado;
use App\Models\Imagenes;
use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerOfertasController extends Controller
{
    public function __invoke()
    {
        return view('User.BannerOfertas');
    }
    public function ConsultaAll()
    {
        $BannerOfertas = DB::table('banner')
            ->select(DB::raw('
            BANN_ID,
            banner.ESTADO_ESTA_ID,
            PROD_NOMBRE,
            PROD_COMPLEMENTO,
            MARC_IMAGEN,
            UNME_MEDIDA,
            OFER_DESCUENTO,
            imagBan.IMAG_NOMBRE,
            ESTA_TIPO,
            CASE WHEN PROD_COMPLEMENTO IS NOT NULL THEN PROD_COMPLEMENTO
            ELSE " " END COMPLEMENTO,
            imagBan.IMAG_DIRECCIONIMAGEN AS IMGBANNER,
            imagPre.IMAG_DIRECCIONIMAGEN AS IMGPRESENTACION
            '))
            ->join('oferta', 'banner.OFERTA_OFER_ID', '=', 'oferta.OFER_ID')
            ->join('grupo_sabores', 'oferta.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
            ->join('producto', 'grupo_sabores.PRODUCTO_PROD_ID', '=', 'producto.PROD_ID')
            ->join('marcas', 'marcas.MARC_ID', '=', 'producto.MARCA_MARC_ID')
            ->join('imagenes AS imagBan', 'imagBan.IMAG_ID', '=', 'banner.IMAGENES_IMAG_ID')
            ->join('imagenes AS imagPre', 'imagPre.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->join('estado', 'banner.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->where('imagBan.TIPO_IMAGEN_TIIM_ID', '=', '4')
            ->get();

        return datatables()->of($BannerOfertas)->toJson();
    }
    public function index(Request $request)
    {
        $Tipo = $request->Tipo;
        $Oferta = null;
        $GrupoSabores = null;
        $BannerOferta = null;
        if ($Tipo != null && $Tipo === 'Modificar') {
            // $BannerOferta = BannerOfertas::select(
            //     'BANN_ID',
            //     'banner.ESTADO_ESTA_ID',
            //     'PROD_ID',
            //     'grupo_sabores.GRSA_ID',
            //     'PROD_NOMBRE',
            //     'PROD_COMPLEMENTO',
            //     'UNME_MEDIDA',
            //     'OFER_DESCUENTO',
            //     'imagBan.IMAG_NOMBRE',
            //     'ESTA_TIPO',
            //     'imagBan.IMAG_DIRECCIONIMAGEN AS "IMGBANNER"',
            //     'imagPre.IMAG_DIRECCIONIMAGEN AS "IMGPRESENTACION"'
            // )
            $BannerOferta = DB::table('banner')
                ->select(DB::raw('
            BANN_ID,
            banner.ESTADO_ESTA_ID,
            PROD_ID,
            grupo_sabores.GRSA_ID,
            PROD_NOMBRE,
            PROD_COMPLEMENTO,
            UNME_MEDIDA,
            OFER_DESCUENTO,
            imagBan.IMAG_NOMBRE,
            ESTA_TIPO,
            imagBan.IMAG_ID AS IDBANNER,
            imagBan.IMAG_DIRECCIONIMAGEN AS IMGBANNER,
            imagPre.IMAG_DIRECCIONIMAGEN AS IMGPRESENTACION
            '))
                ->join('oferta', 'banner.OFERTA_OFER_ID', '=', 'oferta.OFER_ID')
                ->join('grupo_sabores', 'oferta.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
                ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
                ->join('producto', 'grupo_sabores.PRODUCTO_PROD_ID', '=', 'producto.PROD_ID')
                ->join('imagenes AS imagBan', 'imagBan.IMAG_ID', '=', 'banner.IMAGENES_IMAG_ID')
                ->join('imagenes AS imagPre', 'imagPre.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
                ->join('estado', 'banner.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                ->where('banner.BANN_ID', '=', $request->BANN_ID)
                ->where('imagBan.TIPO_IMAGEN_TIIM_ID', '=', '4')
                ->limit(1)
                ->get();
            // $GrupoSabores = GrupoSabores::findOrFail($Oferta->GRUPO_SABORES_GRSA_ID);
        } else {
            $Tipo = null;
        }

        $Estados = Estado::all()->where('ESTA_TIPO', '!=', 'Eliminado');
        $ImagenDeportiva = Imagenes::all()->where('ESTADO_ESTA_ID', '=', '1')->where('TIPO_IMAGEN_TIIM_ID', '=', '4');
        $Productos = Ofertas::select(
            'OFER_ID',
            'PROD_ID',
            'PROD_NOMBRE',
            'PROD_COMPLEMENTO',
            'oferta.ESTADO_ESTA_ID',
            'PROD_NOMBRE',
            'PROD_COMPLEMENTO',
            'ESTA_TIPO',
            'GRSA_ID',
            'UNME_ID',
            'UNME_MEDIDA'
        )
            ->join('grupo_sabores', 'grupo_sabores.GRSA_ID', '=', 'oferta.GRUPO_SABORES_GRSA_ID')
            ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
            ->join('producto', 'producto.PROD_ID', '=', 'grupo_sabores.PRODUCTO_PROD_ID')
            ->join('estado', 'oferta.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->get();

        return view('User.BannerOfertaNuevo', compact('Estados', 'Productos', 'Tipo', 'Oferta', 'GrupoSabores', 'ImagenDeportiva', 'BannerOferta'));
    }

    public function BuscarPresentacionesProductoOferta(Request $request)
    {
        $Prod_id = $request->Prod_id;
        $Productos = Ofertas::select(
            'GRSA_ID',
            'GRSA_PRECIO',
            'GRSA_STOCKMINIMO',
            'SABORES_SABO_ID',
            'SABO_DESCRIPCION',
            'ESTA_TIPO',
            'SABO_ID',
            'UNIDAD_MEDIDA_UNME_ID',
            'UNME_ID',
            'UNME_MEDIDA',
            'grupo_sabores.PRODUCTO_PROD_ID',
            'grupo_sabores.ESTADO_ESTA_ID',
            'IMAG_DIRECCIONIMAGEN'
        )
            ->join('grupo_sabores', 'grupo_sabores.GRSA_ID', '=', 'oferta.GRUPO_SABORES_GRSA_ID')
            ->leftjoin('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
            ->join('producto', 'producto.PROD_ID', '=', 'grupo_sabores.PRODUCTO_PROD_ID')
            ->join('estado', 'oferta.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
            ->join('imagenes', 'imagenes.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $Prod_id)
            ->where('imagenes.TIPO_IMAGEN_TIIM_ID', '=', '3')
            ->get();
        return response(json_encode($Productos), 200)->header('Content-type', 'text/plain');
    }

    public function BuscarFotoDeportiva(Request $request)
    {
        $Imag_id = $request->Imag_id;
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
            ->where('IMAG_ID', '=', $Imag_id)
            ->get();
        return response(json_encode($Imagenes), 200)->header('Content-type', 'text/plain');
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'sel_producto_nuevo_banner' => 'required|numeric',
            'sel_presentacion_nuevo_banner' => 'required|numeric',
            'sel_estado_nuevo_banner' => 'required|numeric',
            'sel_imgDeportiva_nuevo_banner' => 'required|numeric',
        ]);
        $Grsa = "0";
        $Oferta = Ofertas::all()->where('GRUPO_SABORES_GRSA_ID', '=', $request->sel_presentacion_nuevo_banner);
        if ($Oferta != null && $Oferta != '' && count($Oferta) > 0) {
            foreach ($Oferta as $fila) {
                $Grsa = $fila->OFER_ID;
            }
        }
        $BannerOferta = new BannerOfertas();
        $BannerOferta->BANN_REGISTRADOPOR = auth()->user()->USUA_ID;
        $BannerOferta->OFERTA_OFER_ID = $Grsa;
        $BannerOferta->ESTADO_ESTA_ID = $request->sel_estado_nuevo_banner;
        $BannerOferta->IMAGENES_IMAG_ID = $request->sel_imgDeportiva_nuevo_banner;
        if ($BannerOferta->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El banner se  registro satisfactoriamente',
            ];
            return redirect()->route('OfertasBannerUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar el banner',
            ];
            return back()->with($msg);
        }
    }

    public function Modificar(Request $request)
    {
    
        $request->validate([
            'bann_id' => 'required|numeric',
            'sel_producto_nuevo_banner' => 'required|numeric',
            'sel_presentacion_nuevo_banner' => 'required|numeric',
            'sel_estado_nuevo_banner' => 'required|numeric',
            'sel_imgDeportiva_nuevo_banner' => 'required|numeric',
        ]);
        
        $Grsa = "0";
        $Oferta = Ofertas::all()->where('GRUPO_SABORES_GRSA_ID', '=', $request->sel_presentacion_nuevo_banner);
        if ($Oferta != null && $Oferta != '' && count($Oferta) > 0) {
            foreach ($Oferta as $fila) {
                $Grsa = $fila->OFER_ID;
            }
        }
        $BannerOferta = BannerOfertas::findOrFail($request->bann_id);
        $BannerOferta->BANN_REGISTRADOPOR = auth()->user()->USUA_ID;
        $BannerOferta->OFERTA_OFER_ID = $Grsa;
        $BannerOferta->ESTADO_ESTA_ID = $request->sel_estado_nuevo_banner;
        $BannerOferta->IMAGENES_IMAG_ID = $request->sel_imgDeportiva_nuevo_banner;

        if ($BannerOferta->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El banner se Actualizo satisfactoriamente',
            ];
            return redirect()->route('OfertasBannerUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar el banner',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_bann_id_eliminar' => 'required|numeric',
        ]);
        $BannerOferta = BannerOfertas::findOrFail($request->txt_bann_id_eliminar);
        $BannerOferta->ESTADO_ESTA_ID = "4";
        if ($BannerOferta->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El banner fue Eliminado satisfactoriamente',
            ];
            return redirect()->route('OfertasBannerUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el banner',
            ];
            return back()->with($msg);
        }
    }
}
