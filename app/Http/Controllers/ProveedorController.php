<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Estado;
use App\Models\Proveedor;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __invoke()
    {
        $TipoDoc = TipoDocumento::all();
        $Estados = Estado::all()->where('ESTA_ID', '!=', '4');
        $Departamento = Departamento::all()->where('ESTADO_ESTA_ID', '=', '1');
        $Proveedores = Proveedor::all();
        //$Proveedores = DB::table('proveedor')->paginate(5);
        return view('User.Proveedores', compact('TipoDoc', 'Departamento', 'Proveedores', 'Estados'));
    }

    public function Actualizar(Request $request)
    {

        if ($request->Accion != null && $request->Accion == 'Registrar') {
            $request->validate([
                'txt_nombre_nuevo_proveedores' => 'required',
                'sel_tipoDocumento_nuevo_proveedores' => 'required||numeric',
                'num_documento_nuevo_proveedores' => 'required|numeric',
                'sel_departamento_nuevo_proveedores' => 'required|numeric',
                'sel_municipio_nuevo_proveedores' => 'required|numeric',
                'txt_direccion_nuevo_proveedores' => 'required',
                'sel_estado_nuevo_proveedores' => 'required',
                'num_celular_nuevo_proveedores' => 'required|numeric',
                'txt_correo_nuevo_proveedores' => 'required|email',
            ]);
            $Proveedor = new Proveedor();
            $Proveedor->PROV_ID = $request->Prov_id;
            $Proveedor->PROV_NOMBRE = $request->txt_nombre_nuevo_proveedores;
            $Proveedor->PROV_NIT = $request->num_documento_nuevo_proveedores;
            $Proveedor->PROV_DIRECCION = $request->txt_direccion_nuevo_proveedores;
            $Proveedor->PROV_TELEFONO = $request->num_telefono_nuevo_proveedores;
            $Proveedor->PROV_CORREO = $request->txt_correo_nuevo_proveedores;
            $Proveedor->PROV_CELULAR = $request->num_celular_nuevo_proveedores;
            $Proveedor->TIPO_DOCUMENTO_TIDO_ID = $request->sel_tipoDocumento_nuevo_proveedores;
            $Proveedor->CIUDAD_CIUD_ID = $request->sel_municipio_nuevo_proveedores;
            $Proveedor->ESTADO_ESTA_ID = $request->sel_estado_nuevo_proveedores;
            $Proveedor->PROV_REGISTRADOPOR = auth()->user()->USUA_ID;
        }
        if ($request->Accion != null && $request->Accion == 'Modificar') {
            $request->validate([
                'txt_nombre_editar_proveedores' => 'required',
                'sel_tipoDocumento_editar_proveedores' => 'required||numeric',
                'num_documento_editar_proveedores' => 'required|numeric',
                'sel_departamento_editar_proveedores' => 'required|numeric',
                'sel_municipio_editar_proveedores' => 'required|numeric',
                'txt_direccion_editar_proveedores' => 'required',
                'sel_estado_editar_proveedores' => 'required',
                'num_celular_editar_proveedores' => 'required|numeric',
                'txt_correo_editar_proveedores' => 'required|email',
            ]);
            $Proveedor = Proveedor::findOrFail($request->Prov_id);
            $Proveedor->PROV_NOMBRE = $request->txt_nombre_editar_proveedores;
            $Proveedor->PROV_NIT = $request->num_documento_editar_proveedores;
            $Proveedor->PROV_DIRECCION = $request->txt_direccion_editar_proveedores;
            $Proveedor->PROV_TELEFONO = $request->num_telefono_editar_proveedores;
            $Proveedor->PROV_CORREO = $request->txt_correo_editar_proveedores;
            $Proveedor->PROV_CELULAR = $request->num_celular_editar_proveedores;
            $Proveedor->TIPO_DOCUMENTO_TIDO_ID = $request->sel_tipoDocumento_editar_proveedores;
            $Proveedor->CIUDAD_CIUD_ID = $request->sel_municipio_editar_proveedores;
            $Proveedor->ESTADO_ESTA_ID = $request->sel_estado_editar_proveedores;
            $Proveedor->PROV_REGISTRADOPOR = auth()->user()->USUA_ID;
        }
        if ($Proveedor->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'Proveedor Actualizado satisfactoriamente',
            ];
            return redirect()->route('ProveedorUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Actualizar o Registrar la información',
            ];
            return back()->with($msg);
        }

    }

    public function ConsultaAll()
    {
        $Proveedores = Proveedor::select('PROV_ID', 'PROV_NOMBRE', 'PROV_CELULAR', 'PROV_NIT',
            'ESTA_TIPO', 'TIDO_DESCRIPCION')
            ->join('tipo_documento', 'proveedor.TIPO_DOCUMENTO_TIDO_ID', '=', 'tipo_documento.TIDO_ID')
            ->join('estado', 'proveedor.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->where('ESTA_TIPO', '!=', 'Eliminado')
            ->get();

        return datatables()->of($Proveedores)->toJson();
    }

    public function ConsultaEspecifica(Request $request)
    {
        $Proveedor = Proveedor::select('PROV_ID', 'PROV_NOMBRE', 'TIDO_DESCRIPCION', 'PROV_NIT',
            'DEPA_DESCRIPCION', 'CIUD_DESCRIPCION', 'PROV_DIRECCION', 'PROV_TELEFONO', 'PROV_CELULAR',
            'PROV_CORREO', 'ESTA_TIPO', 'CIUD_ID', 'DEPA_ID', 'TIDO_ID', 'ESTA_ID')
            ->join('tipo_documento', 'proveedor.TIPO_DOCUMENTO_TIDO_ID', '=', 'tipo_documento.TIDO_ID')
            ->join('estado', 'proveedor.ESTADO_ESTA_ID', '=', 'estado.ESTA_ID')
            ->join('ciudad', 'proveedor.CIUDAD_CIUD_ID', '=', 'ciudad.CIUD_ID')
            ->join('departamento', 'ciudad.DEPARTAMENTO_DEPA_ID', '=', 'departamento.DEPA_ID')
            ->where('PROV_ID', request('Prov_id'))
            ->get();
        return response(json_encode($Proveedor), 200)->header('Content-type', 'text/plain');
    }

    public function Eliminar(Request $request)
    {
        $request->validate([
            'Proveedor_id_eliminar' => 'required|numeric',
        ]);

        $Proveedor = Proveedor::findOrFail($request->Proveedor_id_eliminar);
        $Proveedor->ESTADO_ESTA_ID = "4";
        if ($Proveedor->save()) {
            $msg = [
                'message' => 'Exitoso',
                'RespuestaExito' => 'Proveedor Eliminado satisfactoriamente',
            ];
            return redirect()->route('ProveedorUser')->with($msg);
        } else {
            $msg = [
                'MsgErrorSistema' => 'Error',
                'RespuestaErrorSistema' => 'Ups se presentó un error al Eliminar el proveedor',
            ];
            return back()->with($msg);
        }
        // return 'ok';
    }
}
