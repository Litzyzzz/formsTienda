<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juegos; 
use App\Models\Plataformas;
use App\Models\Categorias;
use App\Models\Proveedores;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class vistaJuegosController extends Controller
{
    public function index()
    {
        $videogames = Juegos::with(['plataforma', 'genero', 'proveedor'])->get();
        
        return view('viewsCliente.index', compact('videogames'));
    }
}
    
    