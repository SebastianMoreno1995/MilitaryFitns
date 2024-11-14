<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SubCategoriasController extends Controller
{
    public function Registrar(Request $request)
    {

        $request->validate([
            'Cate_id_Registro' => 'required',
            'txt_nombre_nuevo_subcategorias' => 'required',
            'are_descripcion_nuevo_subcategorias' => 'required',
            'sel_estado_nuevo_subcategorias' => 'required|numeric',
        ]);

        $SubCategorias = new SubCategorias();
        $SubCategorias->CATEGORIA_CATE_ID = $request->Cate_id_Registro;
        $SubCategorias->SUBC_NOMBRE = $request->txt_nombre_nuevo_subcategorias;
        $SubCategorias->SUBC_DESCRIPCION = $request->are_descripcion_nuevo_subcategorias;
        $SubCategorias->SUBC_REGISTRADOPOR = auth()->user()->USUA_ID;
        $SubCategorias->ESTADO_ESTA_ID = $request->sel_estado_nuevo_subcategorias;

        if ($SubCategorias->save()) {
            $Categorias = Categorias::findOrFail($request->Cate_id_Registro);
            $ruta = '../public/img/categorias/Cate_' . $Categorias->CATE_ID . '/SubCate_' . $SubCategorias->SUBC_ID;
            if (!File::isDirectory($ruta)) {
                //Crea la Carpeta de la imagen de usuario
                File::makeDirectory($ruta, 0777, true);
            }
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'SubCategoria registrada satisfactoriamente',
            ];
            return redirect()->route('CategoriaUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la SubCategoria',
            ];
            return back()->with($msg);
        }
    }

    public function ConsultaAll(Request $request)
    {
        $CATE_ID = $request->CATE_ID;
        $SubCategorias = SubCategorias::select('SUBC_ID', 'SUBC_NOMBRE', 'SUBC_DESCRIPCION', 'subcategoria.ESTADO_ESTA_ID', 'CATEGORIA_CATE_ID', 'CATE_ID',
            'CATE_NOMBRE', 'ESTA_TIPO')
            ->join('categoria', 'subcategoria.CATEGORIA_CATE_ID', '=', 'categoria.CATE_ID')
            ->join('estado', 'subcategoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->where('CATE_ID', '=', $CATE_ID)
            ->get();

        return datatables()->of($SubCategorias)->toJson();
    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'Subc_id_modificar' => 'required|numeric',
            // 'Cate_id_modificar' => 'required|numeric',
            'txt_nombre_editar_subcategorias' => 'required',
            'are_descripcion_editar_subcategorias' => 'required',
            'sel_estado_editar_subcategorias' => 'required|numeric',
        ]);

        $SubCategorias = SubCategorias::findOrFail($request->Subc_id_modificar);
        // $SubCategorias->CATEGORIA_CATE_ID = $request->Cate_id_modificar;
        $SubCategorias->SUBC_NOMBRE = $request->txt_nombre_editar_subcategorias;
        $SubCategorias->SUBC_DESCRIPCION = $request->are_descripcion_editar_subcategorias;
        $SubCategorias->SUBC_REGISTRADOPOR = auth()->user()->USUA_ID;
        $SubCategorias->ESTADO_ESTA_ID = $request->sel_estado_editar_subcategorias;
        if ($SubCategorias->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'SubCategoria Modificada satisfactoriamente',
            ];
            return redirect()->route('CategoriaUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Modificar la información de la SubCategoria',
            ];
            return back()->with($msg);
        }
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'Subc_id_Eliminar' => 'required|numeric',
        ]);

        $SubCategorias = SubCategorias::findOrFail($request->Subc_id_Eliminar);
        $SubCategorias->ESTADO_ESTA_ID = "4";
        if ($SubCategorias->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La subCategoria fue eliminada satisfactoriamente',
            ];
            return redirect()->route('CategoriaUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al eliminar subCategoria',
            ];
            return back()->with($msg);
        }
    }
}
