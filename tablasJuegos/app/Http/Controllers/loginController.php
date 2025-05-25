<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function showLoginForm()
    {
        return view('viewLogin.login'); // Muestra el formulario de login
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); // ✅ Obtiene credenciales
    
        if (Auth::attempt($credentials)) { // ✅ Pasa las credenciales
            $request->session()->regenerate();
            $user = Auth::user();
    
            // Redirigir según el rol
            if ($user->rol_Id === 1) {
                return redirect()->route('index'); // Admin
            } elseif ($user->rol_Id === 3) {
                return redirect()->route('ordenes.create'); // Cliente
            }
            return redirect('/'); // Redirigir a la página de inicio si no se encuentra el rol
        }
    
        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
