<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //Validación de parámetros, manda un error si falta alguno
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Obtiene solo las credenciales
        $credentials = $request->only('email', 'password');

        //Verifica si las credenciales coinciden
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/product');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        //Cierra la sesión 
        Auth::logout();

        //Borra los tokens y los invalida
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
