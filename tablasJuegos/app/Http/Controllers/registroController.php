<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\usuario;
use Illuminate\Http\Request;


class registroController extends Controller
{
    
    public function index()
    {
        return view('viewLogin.registro');
    }

    public function create()
{
    return view('viewLogin.registro'); // Vista directa (no en subcarpeta)
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:3',
    ]);

    usuario::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'rol_Id' => 1, // Cliente =3 Admin=1
    ]);

    return redirect()->route('login')->with('success', '¡Registro exitoso!');
}
}
