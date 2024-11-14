<?php

namespace App\Http\Controllers;

use App\Models\GrupoSabores;
use App\Models\Presentacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {
        $Productos = DB::table('grupo_sabores')
            ->select(DB::raw('DISTINCT
            producto.PROD_COMPLEMENTO,
            producto.PROD_NOMBRE,
            producto.PROD_ID,
            marcas.MARC_NOMBRE,
            unidad_medida.UNME_MEDIDA,
            grupo_sabores.GRSA_ID,
            grupo_sabores.GRSA_PRECIO,
            grupo_sabores.GRSA_STOCK,
            imagenes.IMAG_DIRECCIONIMAGEN '))
            ->join('producto', 'producto.PROD_ID', '=', 'grupo_sabores.PRODUCTO_PROD_ID')
            ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
            ->join('marcas', 'marcas.MARC_ID', '=', 'producto.MARCA_MARC_ID')
            ->join('estado', 'estado.ESTA_ID', '=', 'grupo_sabores.ESTADO_ESTA_ID')
            ->join('imagenes', 'imagenes.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->where('estado.ESTA_TIPO', '=', 'Activo')
            ->groupBy('unidad_medida.UNME_MEDIDA', 'producto.PROD_COMPLEMENTO')
            ->paginate(8);
        $Date = Carbon::now();
        $Date = $Date->format('Y-m-d');
        $BannerOfertas = DB::table('banner')
            ->select(DB::raw('
            BANN_ID,
            banner.ESTADO_ESTA_ID,
            PROD_ID,
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
            ->where('ESTA_TIPO', '=', 'Activo')
            ->where('imagBan.TIPO_IMAGEN_TIIM_ID', '=', '4')
            ->where('oferta.OFER_FECHAINICIO', '<=', $Date)
            ->where('oferta.OFER_FECHAFIN', '>=', $Date)
            ->get();

        $Categorias = DB::table('categoria')
            ->join('estado', 'categoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTADO_ESTA_ID', '=', '1')
            ->orderBy('CATE_NOMBRE', 'ASC')
            ->get();
        return view('Client.Tienda', compact('Productos', 'BannerOfertas', 'Categorias'));
    }

    public function DetalleProducto(Request $request)
    {
        $Producto_id = $request->PRO_ID;
        $Presentacion_id = $request->GRSA_ID;
        $Producto = '';
        $Categorias = '';
        $ImagenesProducto = '';
        $Presentaciones = '';

        if ($Producto_id != null && $Presentacion_id != null) {
            $Producto = DB::table('grupo_sabores')
                ->select(DB::raw('DISTINCT
                producto.PROD_COMPLEMENTO,
                producto.PROD_NOMBRE,
                producto.PROD_ID,
                marcas.MARC_NOMBRE,
                unidad_medida.UNME_MEDIDA,
                grupo_sabores.GRSA_PRECIO,
                grupo_sabores.GRSA_STOCK,
                imagenes.IMAG_DIRECCIONIMAGEN,
                sabores.SABO_DESCRIPCION,
                sabores.SABO_ID
                '))
                ->join('producto', 'producto.PROD_ID', '=', 'grupo_sabores.PRODUCTO_PROD_ID')
                ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
                ->join('marcas', 'marcas.MARC_ID', '=', 'producto.MARCA_MARC_ID')
                ->join('estado', 'estado.ESTA_ID', '=', 'grupo_sabores.ESTADO_ESTA_ID')
                ->join('imagenes', 'imagenes.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
                ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
                ->where('estado.ESTA_TIPO', '=', 'Activo')
                ->where('grupo_sabores.GRSA_ID', '=', $Presentacion_id)
                ->get();

            $Categorias = DB::table('categoria')
                ->join('estado', 'categoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                ->where('ESTADO_ESTA_ID', '=', '1')
                ->orderBy('CATE_NOMBRE', 'ASC')
                ->get();

            $ImagenesProducto = DB::table('grupo_sabores')
                ->select(DB::raw('
            producto.PROD_COMPLEMENTO,
            producto.PROD_NOMBRE,
            producto.PROD_ID,
            marcas.MARC_NOMBRE,
            unidad_medida.UNME_MEDIDA,
            grupo_sabores.GRSA_PRECIO,
            grupo_sabores.GRSA_STOCK,
            imagenes.IMAG_DIRECCIONIMAGEN '))
                ->join('producto', 'producto.PROD_ID', '=', 'grupo_sabores.PRODUCTO_PROD_ID')
                ->join('unidad_medida', 'unidad_medida.UNME_ID', '=', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID')
                ->join('marcas', 'marcas.MARC_ID', '=', 'producto.MARCA_MARC_ID')
                ->join('estado', 'estado.ESTA_ID', '=', 'grupo_sabores.ESTADO_ESTA_ID')
                ->join('imagenes', 'imagenes.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
                ->where('estado.ESTA_TIPO', '=', 'Activo')
                ->where('producto.PROD_ID', '=', $Producto_id)
                ->get();
        }

        $Presentaciones = GrupoSabores::select(
            'UNME_ID',
            'GRSA_ID',
            'ESTA_TIPO',
            'UNIDAD_MEDIDA_UNME_ID',
            'UNME_MEDIDA',
            'grupo_sabores.PRODUCTO_PROD_ID',
            'grupo_sabores.ESTADO_ESTA_ID',
            'PRODUCTO_PROD_ID'
        )
            ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
            ->where('estado.ESTA_TIPO', '=', 'Activo')
            ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $Producto_id)
            ->groupBy('unidad_medida.UNME_MEDIDA')
            ->get();
        return view('Client.InformacionProducto', compact('Producto_id', 'Categorias', 'ImagenesProducto', 'Producto','Presentaciones'));
    }

    public function BuscarInfoPresentaciones(Request $request)
    {
        $Grsa_id = $request->Grsa_id;
        $GrupoSabores = DB::table('grupo_sabores')
            ->select(DB::raw('
            grupo_sabores.GRSA_ID,
            grupo_sabores.GRSA_PRECIO,
            grupo_sabores.GRSA_STOCK,
            SABO_ID,
            imagenes.IMAG_DIRECCIONIMAGEN'))
            ->join('estado', 'estado.ESTA_ID', '=', 'grupo_sabores.ESTADO_ESTA_ID')
            ->join('imagenes', 'imagenes.GRUPO_SABORES_GRSA_ID', '=', 'grupo_sabores.GRSA_ID')
            ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
            ->where('estado.ESTA_TIPO', '=', 'Activo')
            ->where('grupo_sabores.GRSA_ID', '=', $Grsa_id)
            ->get();
        
        return response(json_encode($GrupoSabores), 200)->header('Content-type', 'text/plain');
    }
    
}
