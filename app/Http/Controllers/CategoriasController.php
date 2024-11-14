<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoriasController extends Controller
{
    public function __invoke()
    {
        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        $Categorias = DB::table('categoria')
            ->join('estado', 'categoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTADO_ESTA_ID', '!=', '4')->paginate(4);
        return view('User.Categorias', compact('Estados', 'Categorias'));
    }

    public function Index(Request $request)
    {
        $Buscar = trim($request->get('Buscar'));
        // $Cantidad = $request->get('CantCategorias');
        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        $Categorias = DB::table('categoria')
        ->join('estado', 'categoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('CATE_NOMBRE', 'LIKE', '%' . $Buscar . '%')
            ->orderBy('CATE_NOMBRE', 'ASC')
            ->where('ESTADO_ESTA_ID', '!=', '4')
            ->paginate('2');
        return view('User.Categorias', compact('Estados', 'Categorias', 'Buscar'));
    }
    public function FiltroFilas(Request $request)
    {
        $Cantidad = $request->get('CantCategorias');
        $Estados = Estado::all()->where('ESTA_TIPO', '!=', 'Eliminado');
        $Categorias = DB::table('categoria')
        ->join('estado', 'categoria.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->orderBy('CATE_NOMBRE', 'ASC')
            ->where('ESTADO_ESTA_ID', '!=', '4')
            ->paginate($Cantidad);
        return view('User.Categorias', compact('Estados', 'Categorias', 'Cantidad'));
    }

    public function Search(Request $request)
    {
        $term = $request->get('term');
        $Categorias = Categorias::where('CATE_NOMBRE', 'LIKE', '%' . $term . '%')->get();
        $data = [];
        foreach ($Categorias as $fila) {
            $data[] = [
                'label' => $fila->CATE_NOMBRE,
            ];
        }
        return $data;
    }

    public function Registrar(Request $request)
    {

        $request->validate([
            'txt_nombre_nuevo_categorias' => 'required',
            'are_descripcion_nuevo_categorias' => 'required',
            'txt_imagen_nuevo_categorias' => 'required',
            'input_file_nuevo' => 'required|image',
            'sel_estado_nuevo_categorias' => 'required',
        ]);

        $Categorias = Categorias::all()->where('CATE_NOMBRE', '=', $request->txt_nombre_nuevo_categorias);
        if ($Categorias != null && count($Categorias) > 0) {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups la Categoria ya existe',
            ];
            return back()->with($msg);
        } else {

        $Categorias = new Categorias();
        $Categorias->CATE_NOMBRE = $request->txt_nombre_nuevo_categorias;
        $Categorias->CATE_DESCRIPCION = $request->are_descripcion_nuevo_categorias;
        $Categorias->CATE_REGISTRADAPOR = auth()->user()->USUA_ID;
        $Categorias->ESTADO_ESTA_ID = $request->sel_estado_nuevo_categorias;
        $Categorias->CATE_IMAGEN = 'Cargando';

        if ($Categorias->save()) {
            $ruta = '../public/img/categorias/Cate_' . $Categorias->CATE_ID;
            if (!File::isDirectory($ruta)) {
                //Crea la Carpeta de la imagen de usuario
                File::makeDirectory($ruta, 0777, true);

                $destinoImagen = 'img/categorias/Cate_' . $Categorias->CATE_ID . '/';
                $file = $request->file('input_file_nuevo');
                $filename = 'Cate_' . $Categorias->CATE_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_nuevo')->move($destinoImagen, $filename)) {
                    $CategoriasImagen = Categorias::findOrFail($Categorias->CATE_ID);
                    $CategoriasImagen->CATE_IMAGEN = $destinoImagen . $filename;

                    if ($CategoriasImagen->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Categoria registrada satisfactoriamente',
                        ];
                        return redirect()->route('CategoriaUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Categoria',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen de la categoria',
                    ];
                    return back()->with($msg);
                }

            } else {
                $msg = [
                    'MsgErrorPassword' => null,
                    'MsgErrorSistema' => 'ErrorSistema',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Crear la Carpeta de la categoria',
                ];
                return back()->with($msg);
            }
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Categoria',
            ];
            return back()->with($msg);
        }
    }

    }

    public function Modificar(Request $request)
    {

        $request->validate([
            'Cate_id_Modificar' => 'required',
            'txt_imagen_editar_categorias' => 'required',
            'txt_nombre_editar_categorias' => 'required',
            'are_descripcion_editar_categorias' => 'required',
            'sel_estado_editar_categorias' => 'required',
        ]);

        $Categorias = Categorias::findOrFail($request->Cate_id_Modificar);
        $Categorias->CATE_NOMBRE = $request->txt_nombre_editar_categorias;
        $Categorias->CATE_DESCRIPCION = $request->are_descripcion_editar_categorias;
        $Categorias->CATE_REGISTRADAPOR = auth()->user()->USUA_ID;
        $Categorias->ESTADO_ESTA_ID = $request->sel_estado_editar_categorias;

        if ($Categorias->CATE_IMAGEN != null && $Categorias->CATE_IMAGEN != '') {
            if ($request->txt_imagen_editar_categorias === $Categorias->CATE_IMAGEN) {
                if ($Categorias->save()) {
                    $msg = [
                        'message' => 'Exitoso',
                        'RespuestaExito' => 'Categoria Actualizada satisfactoriamente',
                    ];
                    return redirect()->route('CategoriaUser')->with($msg);
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la Categoria',
                    ];
                    return back()->with($msg);
                }
            } else {
                $request->validate([
                    'input_file_editar' => 'required|image',
                ]);

                unlink(public_path($Categorias->CATE_IMAGEN));
                $destinoImagen = 'img/categorias/Cate_' . $Categorias->CATE_ID . '/';
                $file = $request->file('input_file_editar');
                $filename = 'Cate_' . $Categorias->CATE_ID . '-Img.' . $file->getClientOriginalExtension();
                if ($request->file('input_file_editar')->move($destinoImagen, $filename)) {
                    $Categorias->CATE_IMAGEN = $destinoImagen . $filename;
                    if ($Categorias->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'Categoria Actualizada satisfactoriamente',
                        ];
                        return redirect()->route('CategoriaUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la Categoria',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Modificar la imagen de la categoria',
                    ];
                    return back()->with($msg);
                }
            }
        }

    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'Cate_id_Eliminar' => 'required|numeric',
        ]);

        $Categoria = Categorias::findOrFail($request->Cate_id_Eliminar);
        $Categoria->ESTADO_ESTA_ID = "4";
        if ($Categoria->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'la Categoria fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('CategoriaUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar la Categoria',
            ];
            return back()->with($msg);
        }
    }
}
