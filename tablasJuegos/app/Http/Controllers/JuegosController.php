<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juegos; 
use App\Models\Plataformas;
use App\Models\Categorias;
use App\Models\Proveedores;
use Illuminate\Support\Facades\Validator;


class JuegosController extends Controller
{
    public function index()
    {

        $videogames = Juegos::with(['plataforma', 'genero', 'proveedor'])->get();
        return view('viewsJuegos.index', compact('videogames'));
    }
    public function create()
    {
        $plataformas = Plataformas::all();
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();

    return view('viewsJuegos.crear', compact('plataformas', 'categorias', 'proveedores'));
    }
        
    

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),[
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_dispo' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plataformaId' => 'required|integer',
            'generoId' => 'required|integer',
            'proveedorId' => 'required|integer',
        ]);
        Juegos::create($request->all());
        return redirect()->route('index'); 
    }

    public function editar($juegosId){
        $videogames = Juegos::find($juegosId);
        $plataformas = Plataformas::all();
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();

        return view('viewsJuegos.editar', compact('videogames', 'plataformas', 'categorias', 'proveedores'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),[
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_dispo' => 'required|integer',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'plataformaId' => 'required|integer',
            'generoId' => 'required|integer',
            'proveedorId' => 'required|integer',
        ]);
        Juegos::find($id)->update($request->all());
        return redirect()->route('index'); 
    }

    public function eliminar($juegosId)
    {
        $videogames = Juegos::find($juegosId);
        $videogames->delete();
        return redirect()->route('index');
    }
    


    

       
}
