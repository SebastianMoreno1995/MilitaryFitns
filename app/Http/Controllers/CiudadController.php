<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function CiudadEspecifica(Request $request)
    {

        //$Ciudades = request('IdDepartamento');
        $Ciudades = Ciudad::where('DEPARTAMENTO_DEPA_ID', request('IdDepartamento'))
            ->where('ESTADO_ESTA_ID', '=', '1')
            ->get();
        return response(json_encode($Ciudades), 200)->header('Content-type', 'text/plain');
    }
}
