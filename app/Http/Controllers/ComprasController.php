<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\DetalleCompra;
use App\Models\GrupoSabores;
use App\Models\Impuesto;
use App\Models\Presentacion;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function __invoke()
    {

        $Proveedores = Proveedor::all()->where('ESTADO_ESTA_ID', '=', '1');
        $Impuesto = Impuesto::all()->where('ESTADO_ESTA_ID', '=', '1');
        $Producto = Producto::all()->where('ESTADO_ESTA_ID', '=', '1');
        return view('User.Compras', compact('Proveedores', 'Impuesto', 'Producto'));
    }

    public function BuscarPresentacionesProducto(Request $request)
    {
        $Prod_id = $request->Prod_id;
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
            'grupo_sabores.ESTADO_ESTA_ID'
        )
            ->join('estado', 'grupo_sabores.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->leftjoin('sabores', 'grupo_sabores.SABORES_SABO_ID', '=', 'sabores.SABO_ID')
            ->leftjoin('unidad_medida', 'grupo_sabores.UNIDAD_MEDIDA_UNME_ID', '=', 'unidad_medida.UNME_ID')
            ->where('grupo_sabores.PRODUCTO_PROD_ID', '=', $Prod_id)
            ->orderBy('UNME_MEDIDA', 'ASC')
            ->orderBy('SABO_DESCRIPCION', 'ASC')
            ->get();
        return response(json_encode($GrupoSabores), 200)->header('Content-type', 'text/plain');
    }

    public function Registrar(Request $request)
    {
        $request->validate([
            'ArrayCompra' => 'required',
        ]);
        $ArrayCart =  json_decode($request->ArrayCompra);

        $conteo = count($ArrayCart);
        $FechaFactura = "";
        $Proveedor = "";
        $Impuesto = "";
        $Descuento = "";
        $x = 0;
        $conteo = count($ArrayCart);

        $Compras = new Compras();

        foreach ($ArrayCart as $fila) {
            $FechaFactura = $fila->fecha;
            $Proveedor = $fila->proveedor;
            $Impuesto = $fila->impuesto;
            $Descuento = $fila->descuento;
            $Compras->COMP_DESCUENTO = $Descuento;
            $Compras->COMP_FEHCACOMPRA = $FechaFactura;
            $Compras->TIPO_IMPUESTO_TPIM_ID = $Impuesto;
            $Compras->PROVEEDOR_PROV_ID = $Proveedor;
            $Compras->ESTADO_ESTA_ID = "1";
            $Compras->COMP_REGISTRADOPOR = auth()->user()->USUA_ID;
            if ($Compras->save()) {
                foreach ($fila->detalle as $fila1) {
                    $DetalleCompra = new DetalleCompra();
                    $DetalleCompra->DECO_REGISTRADOPOR = auth()->user()->USUA_ID;
                    $DetalleCompra->DECO_PRECIO = $fila1->precio;
                    $DetalleCompra->DECO_CANTIDAD = $fila1->cantidad;
                    $DetalleCompra->DECO_FECHAVENCIMIENTO = $FechaFactura;
                    $DetalleCompra->PRODUCTO_PROD_ID =  $fila1->producto;
                    $DetalleCompra->GRUPO_SABORES_GRSA_ID =  $fila1->presentacion;
                    $DetalleCompra->COMPRAS_COMP_ID = $Compras->COMP_ID;
                    if ($DetalleCompra->save()) {
                        $GrupoSabores = GrupoSabores::findOrFail($fila1->presentacion);
                        $GrupoSabores->GRSA_STOCK = $fila1->cantidad;
                        if ($GrupoSabores->save()) {
                            $x = 0;
                        } else {
                            $x++;
                        }
                    } else {
                        $x++;
                    }
                }
            } else {
                $msg = [
                    'MsgErrorSistema' => 'Error',
                    'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Compra',
                ];
                return back()->with($msg);
            }
        }
        if ($x == 0) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'Compra registrada satisfactoriamente',
            ];
            return redirect()->route('ComprasUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Registrar la información de la Compra',
            ];
            return back()->with($msg);
        }
        // return  $x;
    }
}
