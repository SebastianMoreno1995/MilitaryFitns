<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txt_nombre' => 'required',
            'txt_apellido' => 'required',
            'txt_tipoDocumento' => 'required',
            'num_documento' => 'required|numeric',
            'txt_departamento' => 'required',
            'txt_municipio' => 'required',
            'txt_direccion' => 'required',
            'num_telefono' => 'required|numeric',
            'txt_correo' => 'required|email',
            'date_fechaNacimiento' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txt_nombre.required' => 'Ingrese un nombre.',
            'num_documento.required' => 'Ingrese el numero de documento.',
            'num_documento.numeric' => 'Solo se admiten numeros.',
            'txt_correo.required' => 'Compruebe el campo de correo electrónico. No parece ser válido.',
            'txt_correo.email' => 'Compruebe que sea un correo valido.',
        ];
    }
}
