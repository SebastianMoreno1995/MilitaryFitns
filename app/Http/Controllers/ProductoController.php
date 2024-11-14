<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Estado;
use App\Models\GrupoSabores;
use App\Models\Imagenes;
use App\Models\Marcas;
use App\Models\Objetivos;
use App\Models\Presentacion;
use App\Models\Producto;
use App\Models\ProductoObjetivos;
use App\Models\Sabores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function __invoke()
    {

        return view('User.Productos');
    }

    public function ConsultaAll()
    {
        $Productos = Producto::select('PROD_ID', 'PROD_NOMBRE', 'PROD_COMPLEMENTO', 'producto.ESTADO_ESTA_ID', 'ESTA_TIPO', 'SUBC_ID', 'SUBC_NOMBRE', 'CATE_ID', 'CATE_NOMBRE')
            ->join('estado', 'producto.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->join('subcategoria', 'producto.SUBCATEGORIA_SUBC_ID', '=', 'subcategoria.SUBC_ID')
            ->join('categoria', 'subcategoria.CATEGORIA_CATE_ID', '=', 'categoria.CATE_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->orderBy('PROD_NOMBRE', 'ASC')
            ->get();

        return datatables()->of($Productos)->toJson();
    }

    public function index(Request $request)
    {
        $Tipo = $request->Tipo;
        $Producto = "";
        $SubCategorias = "";
        if ($Tipo != null && $Tipo === 'Modificar') {
            $Producto = Producto::findOrFail($request->PROD_ID);
            $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
        } else {
            $Tipo = null;
        }

        $Estados = Estado::all()->where('ESTA_TIPO', '!=', 'Eliminado');
        $Marcas = Marcas::all()->where('ESTADO_ESTA_ID', '!=', '4')->sortBy("MARC_NOMBRE");
        $Categorias = Categorias::all()->where('ESTADO_ESTA_ID', '!=', '4')->sortBy("CATE_NOMBRE");
        return view('User.ProductoNuevo', compact('Estados', 'Marcas', 'Categorias', 'Producto', 'Tipo', 'SubCategorias'));
    }
    public function Registrar(Request $request)
    {
        $request->validate([
            'opcion' => 'required|numeric',
        ]);
        $op = $request->opcion;
        switch ($op) {
            case 1:
                $request->validate([
                    'txt_nombre_nuevo_producto' => 'required',
                    // 'txt_complemento_nuevo_producto' => 'required',
                    'sel_marca_nuevo_producto' => 'required|numeric',
                    'sel_subcategoria_nuevo_producto' => 'required|numeric',
                    'are_descripcion_nuevo_producto' => 'required',
                    // 'are_advertencia_nuevo_producto' => 'required',,
                    // 'txt_invima_nuevo_producto' => 'required',
                    'sel_estado_nuevo_producto' => 'required|numeric',
                ]);

                $Producto = Producto::all()->where('PROD_NOMBRE', '=', $request->txt_nombre_nuevo_producto);
                if ($Producto != null && count($Producto) > 0) {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups el Producto ya existe',
                    ];
                    return back()->with($msg);
                } else {

                    $Producto = new Producto();
                    $Producto->PROD_NOMBRE = $request->txt_nombre_nuevo_producto;
                    $Producto->PROD_COMPLEMENTO = $request->txt_complemento_nuevo_producto;
                    $Producto->MARCA_MARC_ID = $request->sel_marca_nuevo_producto;
                    $Producto->SUBCATEGORIA_SUBC_ID = $request->sel_subcategoria_nuevo_producto;
                    $Producto->PROD_DESCRIPCION = $request->are_descripcion_nuevo_producto;
                    $Producto->PROD_ADVERTENCIA = $request->are_advertencia_nuevo_producto;
                    $Producto->PROD_CODIGOBARRAS = $request->txt_codigoBarras_nuevo_producto;
                    $Producto->PROD_REGISTROINVIMA = $request->txt_invima_nuevo_producto;
                    $Producto->ESTADO_ESTA_ID = $request->sel_estado_nuevo_producto;
                    $Producto->PROD_REGISTRADOPOR = auth()->user()->USUA_ID;
                    // $Producto->PROVEEDOR_PROV_ID = "1"; //OOOOOOOOOOOOOOOOOJOO

                    if ($Producto->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'El primer paso del registro de productos fue satisfactorio',
                        ];
                        session(['Prod_id' . auth()->user()->USUA_ID => $Producto->PROD_ID]);
                        session(['Prod_Nombre' . auth()->user()->USUA_ID => $Producto->PROD_NOMBRE]);
                        session(['Prod_Complemento' . auth()->user()->USUA_ID => $Producto->PROD_COMPLEMENTO]);
                        return redirect()->route('ProductosFotosUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información del Producto',
                        ];
                        return back()->with($msg);
                    }
                }

                break;
            case 2:

                $request->validate([
                    'Prod_id' => 'required',
                ]);

                $Producto = Producto::findOrFail($request->Prod_id);
                $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
                $destinoImagen = 'img/categorias/Cate_' . $SubCategorias->CATEGORIA_CATE_ID . '/SubCate_' . $Producto->SUBCATEGORIA_SUBC_ID . '/';
                if ($request->txt_nutricional_nuevo_producto != null && $request->input_file_nutricional_nuevo != null) {
                    $fileNutricional = $request->file('input_file_nutricional_nuevo');
                    $filenameNutricional = 'Prod_' . $Producto->PROD_ID . '_Tiim_2.' . $fileNutricional->getClientOriginalExtension();
                    if ($request->file('input_file_nutricional_nuevo')->move($destinoImagen, $filenameNutricional)) {
                        $ImagenNutricional = new Imagenes();
                        $ImagenNutricional->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filenameNutricional;
                        $ImagenNutricional->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
                        $ImagenNutricional->ESTADO_ESTA_ID = "1";
                        $ImagenNutricional->TIPO_IMAGEN_TIIM_ID = "2";
                        $ImagenNutricional->PRODUCTO_PROD_ID = $Producto->PROD_ID;
                        if ($ImagenNutricional->save()) {
                            $msg = [
                                'message' => 'Exitoso',
                                'RespuestaExito' => 'Exito al registrar la tabla nutricional',
                            ];
                            // return redirect()->route('ProductosPresentacionesUser')->with($msg);
                            return back()->with($msg);
                        } else {
                            $msg = [
                                'MsgErrorSistema' => 'Error',
                                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la tabla nutricional',
                            ];
                            return back()->with($msg);
                        }
                    } else {
                        $msg = [
                            'MsgErrorPassword' => null,
                            'MsgErrorSistema' => 'ErrorSistema',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen Nutricional del producto',
                        ];
                        return back()->with($msg);
                    }
                }

                break;
            case 3:
                $request->validate([
                    'Prod_id' => 'required',
                    'sel_presentacion_nuevo_presentacion' => 'required|numeric',
                    'num_precio_nuevo_presentacion' => 'required|numeric',
                    // 'sel_sabor_nuevo_presentacion' => 'numeric',
                    'txt_imagen_nuevo_presentacion' => 'required',
                    'input_file_nuevo' => 'required|image',
                    'num_stockMin_nuevo_presentacion' => 'required|numeric',
                    'sel_estado_nuevo_presentacion' => 'required',
                ]);

                $GrupoSabores = new GrupoSabores();
                $GrupoSabores->GRSA_DESCRIPCION = "";
                $GrupoSabores->GRSA_STOCK = "0";
                $GrupoSabores->GRSA_REGISTRADOPOR = auth()->user()->USUA_ID;
                $GrupoSabores->SABORES_SABO_ID = $request->sel_sabor_nuevo_presentacion;
                $GrupoSabores->GRSA_STOCKMINIMO = $request->num_stockMin_nuevo_presentacion;
                $GrupoSabores->GRSA_PRECIO = $request->num_precio_nuevo_presentacion;
                $GrupoSabores->ESTADO_ESTA_ID = $request->sel_estado_nuevo_presentacion;
                $GrupoSabores->PRODUCTO_PROD_ID = $request->Prod_id;
                $GrupoSabores->UNIDAD_MEDIDA_UNME_ID = $request->sel_presentacion_nuevo_presentacion;

                if ($GrupoSabores->save()) {
                    $Producto = Producto::findOrFail($request->Prod_id);
                    $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
                    $destinoImagen = 'img/categorias/Cate_' . $SubCategorias->CATEGORIA_CATE_ID . '/SubCate_' . $Producto->SUBCATEGORIA_SUBC_ID . '/';
                    $file = $request->file('input_file_nuevo');
                    $filename = 'Prod_' . $Producto->PROD_ID . '_Tiim_3_Grsa_' . $GrupoSabores->GRSA_ID .
                    '.' . $file->getClientOriginalExtension();
                    if ($request->file('input_file_nuevo')->move($destinoImagen, $filename)) {
                        $Imagen = new Imagenes();
                        $Imagen->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filename;
                        $Imagen->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
                        $Imagen->ESTADO_ESTA_ID = "1";
                        $Imagen->TIPO_IMAGEN_TIIM_ID = "3";
                        $Imagen->PRODUCTO_PROD_ID = $Producto->PROD_ID;
                        $Imagen->GRUPO_SABORES_GRSA_ID = $GrupoSabores->GRSA_ID;

                        if ($Imagen->save()) {
                            $msg = [
                                'message' => 'Exitoso',
                                'RespuestaExito' => 'el registro del producto fue satisfactorio',
                            ];

                            return redirect()->route('ProductosPresentacionesUser')->with($msg);
                        } else {
                            $GrupoSabores->delete();
                            $msg = [
                                'MsgErrorPassword' => null,
                                'MsgErrorSistema' => 'ErrorSistema',
                                'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen de la presentación y sabor del producto',
                            ];
                            return back()->with($msg);
                        }
                    } else {
                        $msg = [
                            'MsgErrorPassword' => null,
                            'MsgErrorSistema' => 'ErrorSistema',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen Portada de la presentación y sabor del producto',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la presentación y sabor del producto',
                    ];
                    return back()->with($msg);
                }

                break;
            case 4:
                $request->validate([
                    'Prod_id' => 'required|numeric',
                    'sel_nombre_nuevo_objetivo' => 'required|numeric',
                    'sel_estado_nuevo_objetivo' => 'required|numeric',
                ]);

                $ObjetivoEliminado = ProductoObjetivos::select(
                    'PROB_ID',
                    'PROB_REGISTRADOPOR',
                    'PROB_FECHAREGISTRO',
                    'PRODUCTO_PROD_ID',
                    'OBJETIVOS_OBJE_ID',
                    'ESTADO_ESTA_ID'
                )
                    ->join('estado', 'producto_objetivos.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                    ->where('PRODUCTO_PROD_ID', '=', $request->Prod_id)
                    ->where('producto_objetivos.OBJETIVOS_OBJE_ID', '=', $request->sel_nombre_nuevo_objetivo)
                    ->where('ESTA_TIPO', '=', 'Eliminado')
                    ->get();

                if ($ObjetivoEliminado != null && $ObjetivoEliminado != '' && count($ObjetivoEliminado) > 0) {
                    $PROB_ID = "0";
                    foreach ($ObjetivoEliminado as $fila) {
                        $PROB_ID = $fila->PROB_ID;
                    }
                    $ObjetivoProducto = ProductoObjetivos::findOrFail($PROB_ID);
                    $ObjetivoProducto->ESTADO_ESTA_ID = $request->sel_estado_nuevo_objetivo;
                } else {

                    $ObjetivoProducto = new ProductoObjetivos();
                    $ObjetivoProducto->PRODUCTO_PROD_ID = $request->Prod_id;
                    $ObjetivoProducto->OBJETIVOS_OBJE_ID = $request->sel_nombre_nuevo_objetivo;
                    $ObjetivoProducto->ESTADO_ESTA_ID = $request->sel_estado_nuevo_objetivo;
                    $ObjetivoProducto->PROB_REGISTRADOPOR = auth()->user()->USUA_ID;
                }
                if ($ObjetivoProducto->save()) {
                    $msg = [
                        'message' => 'Exitoso',
                        'RespuestaExito' => 'La asignacion del objetivo al producto fue satisfactorio',
                    ];

                    return redirect()->route('ProductosPresentacionesUser')->with($msg);
                } else {
                    $msg = [
                        'MsgErrorPassword' => null,
                        'MsgErrorSistema' => 'ErrorSistema',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la asignacion del objetivo al del producto',
                    ];
                    return back()->with($msg);
                }

                break;
            case 5:
                $request->validate([
                    'Prod_id' => 'required|numeric',
                ]);

                $GrupoSabores = GrupoSabores::select(
                    'GRSA_ID',
                    'GRSA_PRECIO',
                    'GRSA_STOCKMINIMO',
                    'SABORES_SABO_ID',
                    'SABO_DESCRIPCION',
                    'SABO_ID',
                    'UNIDAD_MEDIDA_UNME_ID',
                    'UNME_ID',
                    'UNME_MEDIDA',
                    'grupo_sabores.PRODUCTO_PROD_ID',
                    'IMAG_ID',
                    'IMAG_DIRECCIONIMAGEN'
                )
                    ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
                    ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
                    ->leftjoin('imagenes', 'grupo_sabores.GRSA_ID', '=', 'imagenes.GRUPO_SABORES_GRSA_ID')
                    ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                    ->where('ESTA_TIPO', '!=', 'Eliminado')
                    ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $request->Prod_id)
                    ->get();

                $ProductoObjetivos = ProductoObjetivos::select('PROB_ID', 'PRODUCTO_PROD_ID', 'OBJETIVOS_OBJE_ID', 'OBJE_ID', 'OBJE_NOMBRE', 'producto_objetivos.ESTADO_ESTA_ID', 'ESTA_TIPO')
                    ->join('objetivos', 'producto_objetivos.OBJETIVOS_OBJE_ID', '=', 'objetivos.OBJE_ID')
                    ->join('estado', 'producto_objetivos.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                    ->where('ESTA_TIPO', '!=', 'Eliminado')
                    ->where('producto_objetivos.PRODUCTO_PROD_ID', '=', $request->Prod_id)
                    ->get();

                if ($GrupoSabores != null && $GrupoSabores != '' && count($GrupoSabores) > 0) {
                    if ($ProductoObjetivos != null && $ProductoObjetivos != '' && count($ProductoObjetivos) > 0) {
                        $Producto = Producto::findOrFail($request->Prod_id);
                        $Producto->ESTADO_ESTA_ID = "1";
                        if ($Producto->save()) {
                            $msg = [
                                'message' => 'Exitoso',
                                'RespuestaExito' => 'El registro del producto fue exitoso',
                            ];
                            return redirect()->route('ProductosUser')->with($msg);
                        }
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Para finalizar el registro del producto debe registrar por lo menos un objetivo',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Para finalizar el registro del producto debe registrar por lo menos una presentacion',
                    ];
                    return back()->with($msg);
                }
                break;
        }
    }

    public function Index1(Request $request)
    {
        $Tipo = $request->Tipo;
        $Producto = "";
        $Imagenes = "";
        if ($Tipo != null && $Tipo === 'Modificar') {
            $Imagenes = Imagenes::all()->where('PRODUCTO_PROD_ID', '=', $request->PROD_ID);
        } else {
            $Tipo = null;
        }

        return view('User.ProductoFotos', compact('Imagenes', 'Tipo'));
    }
    public function Index2(Request $request)
    {

        $Tipo = $request->Tipo;
        $Presentacion = Presentacion::all()->where('ESTADO_ESTA_ID', '!=', '4')->sortBy("UNME_MEDIDA");
        $Sabor = Sabores::all()->where('ESTADO_ESTA_ID', '!=', '4')->sortBy("SABO_DESCRIPCION");
        $Objetivo = Objetivos::all()->where('ESTADO_ESTA_ID', '!=', '4')->sortBy("OBJE_NOMBRE");
        $Estados = Estado::all()->where('ESTA_TIPO', '!=', 'Eliminado');
        return view('User.ProductoPresentacion', compact('Presentacion', 'Sabor', 'Objetivo', 'Estados', 'Tipo'));
    }

    public function SubCategorias(Request $request)
    {
        $SubCategorias = SubCategorias::where('CATEGORIA_CATE_ID', request('Cate_id'))
            ->where('ESTADO_ESTA_ID', '=', '1')
            ->get();
        return response(json_encode($SubCategorias), 200)->header('Content-type', 'text/plain');
    }

    public function ConsultaAllPresentacion(Request $request)
    {
        $PROD_ID = $request->PROD_ID;
        $GrupoSabores = GrupoSabores::select(
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
            'IMAG_ID',
            'IMAG_DIRECCIONIMAGEN',
            'grupo_sabores.ESTADO_ESTA_ID'
        )
            ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
            ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
            ->leftjoin('imagenes', 'grupo_sabores.GRSA_ID', '=', 'imagenes.GRUPO_SABORES_GRSA_ID')
            ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $PROD_ID)
            ->get();

        return datatables()->of($GrupoSabores)->toJson();
    }

    public function ModificarGrupoSabores(Request $request)
    {

        $request->validate([
            'Prod_id_Mod' => 'required',
            'Grsa_id_Mod' => 'required',
            'Imag_id_Mod' => 'required',
            'sel_presentacion_editar_presentacion' => 'required|numeric',
            'num_precio_editar_presentacion' => 'required|numeric',
            // 'sel_sabor_editar_presentacion' => 'numeric',
            'txt_imagen_editar_presentacion' => 'required',
            'num_stockMin_editar_presentacion' => 'required|numeric',
            'sel_estado_editar_presentacion' => 'required|numeric',
        ]);

        $GrupoSabores = GrupoSabores::findOrFail($request->Grsa_id_Mod);
        $GrupoSabores->GRSA_DESCRIPCION = "";
        $GrupoSabores->GRSA_STOCK = "0";
        $GrupoSabores->GRSA_REGISTRADOPOR = auth()->user()->USUA_ID;
        $GrupoSabores->SABORES_SABO_ID = $request->sel_sabor_editar_presentacion;
        $GrupoSabores->GRSA_STOCKMINIMO = $request->num_stockMin_editar_presentacion;
        $GrupoSabores->GRSA_PRECIO = $request->num_precio_editar_presentacion;
        $GrupoSabores->ESTADO_ESTA_ID = $request->sel_estado_editar_presentacion;
        $GrupoSabores->PRODUCTO_PROD_ID = $request->Prod_id_Mod;
        $GrupoSabores->UNIDAD_MEDIDA_UNME_ID = $request->sel_presentacion_editar_presentacion;

        $Imagen = Imagenes::findOrFail($request->Imag_id_Mod);

        if ($request->txt_imagen_editar_presentacion === $Imagen->IMAG_DIRECCIONIMAGEN) {
            if ($GrupoSabores->save()) {
                $msg = [
                    'message' => 'Exitoso',
                    'RespuestaExito' => 'La presentación y sabor del producto se Actualizo satisfactoriamente',
                ];
                return redirect()->route('ProductosPresentacionesUser')->with($msg);
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la presentación y sabor del producto',
                ];
                return back()->with($msg);
            }
        } else {
            $request->validate([
                'input_file_editar' => 'required|image',
            ]);

            unlink(public_path($Imagen->IMAG_DIRECCIONIMAGEN));
            $Producto = Producto::findOrFail($request->Prod_id_Mod);
            $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
            $destinoImagen = 'img/categorias/Cate_' . $SubCategorias->CATEGORIA_CATE_ID . '/SubCate_' . $Producto->SUBCATEGORIA_SUBC_ID . '/';
            $file = $request->file('input_file_editar');
            $filename = 'Prod_' . $Producto->PROD_ID . '_Tiim_3_Grsa_' . $GrupoSabores->GRSA_ID .
            '.' . $file->getClientOriginalExtension();
            if ($request->file('input_file_editar')->move($destinoImagen, $filename)) {
                $Imagen->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filename;
                if ($GrupoSabores->save()) {
                    if ($Imagen->save()) {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'la información de la presentación y sabor del producto se actualizo satisfactoriamente',
                        ];
                        return redirect()->route('ProductosPresentacionesUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la imagen de la presentación y sabor del producto',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información de la presentación y sabor del producto',
                    ];
                    return back()->with($msg);
                }
            } else {
                $msg = [
                    'MsgErrorPassword' => null,
                    'MsgErrorSistema' => 'ErrorSistema',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Modificar la imagen dela información de la presentación y sabor del producto',
                ];
                return back()->with($msg);
            }
        }
    }

    public function EliminarGrupoSabores(Request $request)
    {

        $request->validate([
            'Grsa_id_Eli' => 'required|numeric',
            'Imag_id_Eli' => 'required|numeric',
        ]);

        $GrupoSabores = GrupoSabores::findOrFail($request->Grsa_id_Eli);
        $Imagen = Imagenes::findOrFail($request->Imag_id_Eli);

        $GrupoSabores->ESTADO_ESTA_ID = "4";
        $Imagen->ESTADO_ESTA_ID = "4";
        // unlink(public_path($Imagen->IMAG_DIRECCIONIMAGEN));

        if ($Imagen->save() && $GrupoSabores->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La presentación y sabor fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('ProductosPresentacionesUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar  la presentación y sabor',
            ];
            return back()->with($msg);
        }
    }

    public function ConsultaAllObjetivos(Request $request)
    {
        $PROD_ID = $request->PROD_ID;
        $ProductoObjetivos = ProductoObjetivos::select('PROB_ID', 'PRODUCTO_PROD_ID', 'OBJETIVOS_OBJE_ID', 'OBJE_ID', 'OBJE_NOMBRE', 'producto_objetivos.ESTADO_ESTA_ID', 'ESTA_TIPO')
            ->join('objetivos', 'producto_objetivos.OBJETIVOS_OBJE_ID', '=', 'objetivos.OBJE_ID')
            ->join('estado', 'producto_objetivos.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->where('producto_objetivos.PRODUCTO_PROD_ID', '=', $PROD_ID)
            ->get();

        return datatables()->of($ProductoObjetivos)->toJson();
    }

    public function ModificarObjetivos(Request $request)
    {

        $request->validate([
            'Prob_id_objetivo' => 'required|numeric',
            'Prod_id_mod_oj' => 'required|numeric',
            'sel_nombre_editar_objetivo' => 'required|numeric',
            'sel_estado_editar_objetivo' => 'required|numeric',
        ]);

        $ProductoObjetivos = ProductoObjetivos::findOrFail($request->Prob_id_objetivo);
        $ProductoObjetivos->OBJETIVOS_OBJE_ID = $request->sel_nombre_editar_objetivo;
        $ProductoObjetivos->ESTADO_ESTA_ID = $request->sel_estado_editar_objetivo;
        if ($ProductoObjetivos->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El objetivo se Actualizo satisfactoriamente',
            ];
            return redirect()->route('ProductosPresentacionesUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar la información del objetivo',
            ];
            return back()->with($msg);
        }
        // return $request->Prob_id_objetivo;
    }

    public function EliminarObjetivosProducto(Request $request)
    {
        $request->validate([
            'Prob_id_objetivo_Eliminar' => 'required|numeric',
        ]);

        $ProductoObjetivos = ProductoObjetivos::findOrFail($request->Prob_id_objetivo_Eliminar);
        $ProductoObjetivos->ESTADO_ESTA_ID = "4";
        if ($ProductoObjetivos->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El objetivo fue Eliminado satisfactoriamente',
            ];
            return redirect()->route('ProductosPresentacionesUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el objetivo',
            ];
            return back()->with($msg);
        }
    }

    public function Modificar(Request $request)
    {
        $request->validate([
            'opcion' => 'required|numeric',
        ]);
        $op = $request->opcion;
        switch ($op) {
            case 1:
                $request->validate([
                    'PROD_ID' => 'required',
                    'txt_nombre_nuevo_producto' => 'required',
                    'sel_marca_nuevo_producto' => 'required|numeric',
                    'sel_subcategoria_nuevo_producto' => 'required|numeric',
                    'are_descripcion_nuevo_producto' => 'required',
                    'sel_estado_nuevo_producto' => 'required|numeric',
                ]);
                $Producto = Producto::findOrFail($request->PROD_ID);
                $Producto->PROD_NOMBRE = $request->txt_nombre_nuevo_producto;
                $Producto->PROD_COMPLEMENTO = $request->txt_complemento_nuevo_producto;
                $Producto->MARCA_MARC_ID = $request->sel_marca_nuevo_producto;
                $Producto->SUBCATEGORIA_SUBC_ID = $request->sel_subcategoria_nuevo_producto;
                $Producto->PROD_DESCRIPCION = $request->are_descripcion_nuevo_producto;
                $Producto->PROD_ADVERTENCIA = $request->are_advertencia_nuevo_producto;
                $Producto->PROD_CODIGOBARRAS = $request->txt_codigoBarras_nuevo_producto;
                $Producto->PROD_REGISTROINVIMA = $request->txt_invima_nuevo_producto;
                $Producto->ESTADO_ESTA_ID = $request->sel_estado_nuevo_producto;
                $Producto->PROD_REGISTRADOPOR = auth()->user()->USUA_ID;

                if ($Producto->save()) {
                    $msg = [
                        'message' => 'Exitoso',
                        'RespuestaExito' => 'El primer paso de la modificacion del producto fue satisfactoria',
                    ];
                    session(['Prod_id' . auth()->user()->USUA_ID => $Producto->PROD_ID]);
                    session(['Prod_Nombre' . auth()->user()->USUA_ID => $Producto->PROD_NOMBRE]);
                    session(['Prod_Complemento' . auth()->user()->USUA_ID => $Producto->PROD_COMPLEMENTO]);
                    return redirect()->route('ProductosFotosUser', ['Tipo' => 'Modificar', 'PROD_ID' => $Producto->PROD_ID])->with($msg);
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Ups se presentó un error al modificar la información del Producto',
                    ];
                    return back()->with($msg);
                }
                break;
            case 2:

                $request->validate([
                    'Prod_id' => 'required',
                    'input_file_nutricional_nuevo' => 'required|image',
                    'txt_nutricional_nuevo_producto' => 'required',
                ]);
                $Imagen = Imagenes::all()->where('PRODUCTO_PROD_ID', '=', $request->Prod_id)->where('TIPO_IMAGEN_TIIM_ID', '=', '2');
                $Producto = Producto::findOrFail($request->Prod_id);
                $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
                $destinoImagen = 'img/categorias/Cate_' . $SubCategorias->CATEGORIA_CATE_ID . '/SubCate_' . $Producto->SUBCATEGORIA_SUBC_ID . '/';
                $fileNutricional = $request->file('input_file_nutricional_nuevo');
                $filenameNutricional = 'Prod_' . $Producto->PROD_ID . '_Tiim_2.' . $fileNutricional->getClientOriginalExtension();
                
                if ($Imagen != null && count($Imagen) > 0) {
                    foreach ($Imagen as $Fila) {
                        if ($Fila->TIPO_IMAGEN_TIIM_ID == '2') {
                            try {
                                if ($Fila->IMAG_DIRECCIONIMAGEN != null && $Fila->IMAG_DIRECCIONIMAGEN != '') {
                                    unlink(public_path($Fila->IMAG_DIRECCIONIMAGEN));
                                }
                            } catch (\Throwable$th) {
                                //throw $th;
                            }
                            if ($request->file('input_file_nutricional_nuevo')->move($destinoImagen, $filenameNutricional)) {
                                $ImagenNutricional = Imagenes::findOrFail($Fila->IMAG_ID);
                                $ImagenNutricional->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filenameNutricional;
                                $ImagenNutricional->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
                                $ImagenNutricional->ESTADO_ESTA_ID = "1";
                                $ImagenNutricional->TIPO_IMAGEN_TIIM_ID = "2";
                                $ImagenNutricional->PRODUCTO_PROD_ID = $Producto->PROD_ID;

                                if ($ImagenNutricional->save()) {
                                    $msg = [
                                        'message' => 'Exitoso',
                                        'RespuestaExito' => 'Exito al modificar la tabla nutricional',
                                    ];
                                    // return redirect()->route('ProductosFotosUser')->with($msg);
                                    return back()->with($msg);
                                } else {
                                    $msg = [
                                        'MsgErrorSistema' => 'Error',
                                        'RespuestaErrorSistema' => 'Ups se presentó un error al modificar la tabla nutricional',
                                    ];
                                    return back()->with($msg);
                                }
                            } else {
                                $msg = [
                                    'MsgErrorPassword' => null,
                                    'MsgErrorSistema' => 'ErrorSistema',
                                    'RespuestaErrorSistema' => 'Ups se presentó un error al modificar la imagen Nutricional del producto',
                                ];
                                return back()->with($msg);
                            }

                        }
                    }
                } else {
                   
                        $fileNutricional = $request->file('input_file_nutricional_nuevo');
                        $filenameNutricional = 'Prod_' . $Producto->PROD_ID . '_Tiim_2.' . $fileNutricional->getClientOriginalExtension();
                        if ($request->file('input_file_nutricional_nuevo')->move($destinoImagen, $filenameNutricional)) {
                            $ImagenNutricional = new Imagenes();
                            $ImagenNutricional->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filenameNutricional;
                            $ImagenNutricional->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
                            $ImagenNutricional->ESTADO_ESTA_ID = "1";
                            $ImagenNutricional->TIPO_IMAGEN_TIIM_ID = "2";
                            $ImagenNutricional->PRODUCTO_PROD_ID = $Producto->PROD_ID;
                            if ($ImagenNutricional->save()) {
                                $msg = [
                                    'message' => 'Exitoso',
                                    'RespuestaExito' => 'Exito al registrar la tabla nutricional',
                                ];
                                // return redirect()->route('ProductosPresentacionesUser')->with($msg);
                                return back()->with($msg);
                            } else {
                                $msg = [
                                    'MsgErrorSistema' => 'Error',
                                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la tabla nutricional',
                                ];
                                return back()->with($msg);
                            }
                        } else {
                            $msg = [
                                'MsgErrorPassword' => null,
                                'MsgErrorSistema' => 'ErrorSistema',
                                'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen Nutricional del producto',
                            ];
                            return back()->with($msg);
                        }
                    
                }
                break;
            case 3:

                break;
            case 4:

                break;
            case 5:
                $request->validate([
                    'Prod_id' => 'required|numeric',
                ]);

                $GrupoSabores = GrupoSabores::select(
                    'GRSA_ID',
                    'GRSA_PRECIO',
                    'GRSA_STOCKMINIMO',
                    'SABORES_SABO_ID',
                    'SABO_DESCRIPCION',
                    'SABO_ID',
                    'UNIDAD_MEDIDA_UNME_ID',
                    'UNME_ID',
                    'UNME_MEDIDA',
                    'grupo_sabores.PRODUCTO_PROD_ID',
                    'IMAG_ID',
                    'IMAG_DIRECCIONIMAGEN'
                )
                    ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
                    ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
                    ->leftjoin('imagenes', 'grupo_sabores.GRSA_ID', '=', 'imagenes.GRUPO_SABORES_GRSA_ID')
                    ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                    ->where('ESTA_TIPO', '!=', 'Eliminado')
                    ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $request->Prod_id)
                    ->get();

                $ProductoObjetivos = ProductoObjetivos::select('PROB_ID', 'PRODUCTO_PROD_ID', 'OBJETIVOS_OBJE_ID', 'OBJE_ID', 'OBJE_NOMBRE', 'producto_objetivos.ESTADO_ESTA_ID', 'ESTA_TIPO')
                    ->join('objetivos', 'producto_objetivos.OBJETIVOS_OBJE_ID', '=', 'objetivos.OBJE_ID')
                    ->join('estado', 'producto_objetivos.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
                    ->where('ESTA_TIPO', '!=', 'Eliminado')
                    ->where('producto_objetivos.PRODUCTO_PROD_ID', '=', $request->Prod_id)
                    ->get();

                if ($GrupoSabores != null && $GrupoSabores != '') {
                    if ($ProductoObjetivos != null && $ProductoObjetivos != '') {
                        $msg = [
                            'message' => 'Exitoso',
                            'RespuestaExito' => 'El registro del producto fue exitoso',
                        ];
                        return redirect()->route('ProductosUser')->with($msg);
                    } else {
                        $msg = [
                            'MsgErrorSistema' => 'Error',
                            'RespuestaErrorSistema' => 'Para finalizar el registro del producto debe registrar por lo menos un objetivo',
                        ];
                        return back()->with($msg);
                    }
                } else {
                    $msg = [
                        'MsgErrorSistema' => 'Error',
                        'RespuestaErrorSistema' => 'Para finalizar el registro del producto debe registrar por lo menos una presentacion',
                    ];
                    return back()->with($msg);
                }
                break;
        }
    }

    public function VerProducto(Request $request)
    {
        $request->validate([
            'PROD_ID' => 'required|numeric',
        ]);

        $PROD_ID = $request->PROD_ID;
        $Producto = "";
        $Portada = "";
        $Nutricional = "";
        $Producto = Producto::select(
            'PROD_ID',
            'PROD_NOMBRE',
            'PROD_COMPLEMENTO',
            'PROD_DESCRIPCION',
            'PROD_REGISTROINVIMA',
            'PROD_ADVERTENCIA',
            'PROD_CODIGOBARRAS',
            'producto.ESTADO_ESTA_ID',
            'ESTA_TIPO',
            'SUBC_ID',
            'SUBC_NOMBRE',
            'CATE_ID',
            'CATE_NOMBRE',
            'MARC_NOMBRE'
        )
            ->join('estado', 'producto.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->join('subcategoria', 'producto.SUBCATEGORIA_SUBC_ID', '=', 'subcategoria.SUBC_ID')
            ->join('categoria', 'subcategoria.CATEGORIA_CATE_ID', '=', 'categoria.CATE_ID')
            ->join('marcas', 'producto.MARCA_MARC_ID', '=', 'marcas.MARC_ID')
            ->where('producto.PROD_ID', '=', $request->PROD_ID)
            ->first();

        $Imagenes = Imagenes::select(
            'IMAG_ID',
            'IMAG_DIRECCIONIMAGEN',
            'TIPO_IMAGEN_TIIM_ID',
            'PRODUCTO_PROD_ID',
            'ESTADO_ESTA_ID',
            'GRUPO_SABORES_GRSA_ID',
            'TIIM_DESCRIPCION'
        )
            ->leftjoin('tipo_imagen', 'tipo_imagen.TIIM_ID', '=', 'imagenes.TIPO_IMAGEN_TIIM_ID')
            ->where('imagenes.PRODUCTO_PROD_ID', '=', $request->PROD_ID)
            ->get();

        if ($Imagenes != null && count($Imagenes) > 0) {
            foreach ($Imagenes as $Fila) {
                if ($Fila->TIIM_DESCRIPCION == "Portada") {
                    $Portada = $Fila->IMAG_DIRECCIONIMAGEN;
                }
                if ($Fila->TIIM_DESCRIPCION == "Nutricional") {
                    $Nutricional = $Fila->IMAG_DIRECCIONIMAGEN;
                }
            }
        }
        return view('User.ProductosVer', compact('Producto', 'Portada', 'Nutricional', 'PROD_ID'));
    }

    public function CargarImagenesComplementarias(Request $request)
    {
        $request->validate([
            'Prod_id' => 'required',
            'txt_portada_nuevo_producto' => 'required',
            'input_file_portada_nuevo' => 'required|image',
        ]);

        $ImagenesPortada = Imagenes::limit(1)->orderBy('IMAG_ID', 'DESC')->get();

        $Imag = 1;
        if ($ImagenesPortada != null) {
            foreach ($ImagenesPortada as $Fila) {
                if ($Fila->IMAG_ID != 0 && $Fila->IMAG_ID > 0) {
                    $Imag = $Fila->IMAG_ID + 1;
                }
            }
        }

        $Producto = Producto::findOrFail($request->Prod_id);
        $SubCategorias = SubCategorias::findOrFail($Producto->SUBCATEGORIA_SUBC_ID);
        $destinoImagen = 'img/categorias/Cate_' . $SubCategorias->CATEGORIA_CATE_ID . '/SubCate_' . $Producto->SUBCATEGORIA_SUBC_ID . '/';
        $filePortada = $request->file('input_file_portada_nuevo');
        $filenamePortada = 'Prod_' . $Producto->PROD_ID . '_Tiim_1_Imag_' . $Imag . '.' . $filePortada->getClientOriginalExtension();

        if ($request->file('input_file_portada_nuevo')->move($destinoImagen, $filenamePortada)) {
            $ImagenPortada = new Imagenes();
            $ImagenPortada->IMAG_DIRECCIONIMAGEN = $destinoImagen . $filenamePortada;
            $ImagenPortada->IMAG_REGISTRADOPOR = auth()->user()->USUA_ID;
            $ImagenPortada->ESTADO_ESTA_ID = "1";
            $ImagenPortada->TIPO_IMAGEN_TIIM_ID = "1";
            $ImagenPortada->PRODUCTO_PROD_ID = $Producto->PROD_ID;
            if ($ImagenPortada->save()) {
                $msg = [
                    'message' => 'Exitoso',
                    'RespuestaExito' => 'Exito al registrar la imagen ',
                ];
                return back()->with($msg);
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar las imagen del producto',
                ];
                return back()->with($msg);
            }
        } else {
            $msg = [
                'MsgErrorPassword' => null,
                'MsgErrorSistema' => 'ErrorSistema',
                'RespuestaErrorSistema' => 'Ups se presentó un error al registrar la imagen del producto',
            ];
            return back()->with($msg);
        }
    }

    public function ConsultaAllFotos(Request $request)
    {
        $PROD_ID = $request->PROD_ID;
        $ProductoFotos = Imagenes::select('IMAG_ID', 'IMAG_DIRECCIONIMAGEN', 'PRODUCTO_PROD_ID', 'ESTADO_ESTA_ID', 'GRUPO_SABORES_GRSA_ID', 'ESTADO_ESTA_ID','TIPO_IMAGEN_TIIM_ID')
            ->join('estado', 'imagenes.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->where('imagenes.PRODUCTO_PROD_ID', '=', $PROD_ID)
            ->where('imagenes.TIPO_IMAGEN_TIIM_ID', '=', '1')
            ->get();

        return datatables()->of($ProductoFotos)->toJson();
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'txt_img_id_eliminar' => 'required|numeric',
        ]);

        $Imagenes = Imagenes::findOrFail($request->txt_img_id_eliminar);

        try {
            if ($Imagenes->IMAG_DIRECCIONIMAGEN != null && $Imagenes->IMAG_DIRECCIONIMAGEN != '') {
                unlink(public_path($Imagenes->IMAG_DIRECCIONIMAGEN));
            }
        } catch (\Throwable$th) {
            //throw $th;
        }

        if ($Imagenes->delete()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'La imagen fue eliminada satisfactoriamente',
            ];
            return back()->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al eliminar la imagen',
            ];
            return back()->with($msg);
        }
    }
    public function EliminarProducto(Request $request)
    {
        $request->validate([
            'txt_prod_id_eliminar' => 'required|numeric',
        ]);
        $Producto = Producto::findOrFail($request->txt_prod_id_eliminar);
        $Producto->ESTADO_ESTA_ID = "4";
        if ($Producto->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'El producto fue Eliminada satisfactoriamente',
            ];
            return redirect()->route('ProductosUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el producto',
            ];
            return back()->with($msg);
        }
    }
}
