<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //public function index()
    public function __invoke()
    {
        return view('User.LoginUser');
    }

    public function Login(Request $request)
    {
        $Usuario = new Usuario();
        $rules = [
            'correo' => 'required|email',
            'password' => 'required|min:8',
        ];
        $messages = [
            'correo.required' => 'Compruebe el campo de correo electrónico. No parece ser válido.',
            'correo.email' => 'Compruebe que sea un correo valido.',
            'password.required' => 'Ingrese una contraseña.',
            'password.min' => 'Su contraseña es demasiado corta.',
        ];
        $this->validate($request, $rules, $messages);
        $credentials = ['USUA_CORREO' => request('correo'), 'password' => request('password'), 'ESTADO_ESTA_ID' => '1'];
        $remember = $request->filled('recordarme');
        if (auth()->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect('Dashboard');
        } else {
            return back()->withErrors(['msg' => 'el correo o la contraseña son incorrectos']);
        }

    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('LoginUser');
    }

}
