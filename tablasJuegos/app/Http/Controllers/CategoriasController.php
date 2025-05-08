<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\Validator;


class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('viewsCategorias.index', compact('categorias'));
     
    }

    public function create()
    {
        return view('viewsCategorias.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),
        [
            'nombre' => 'required|string|max:50'
        ]
        );
        Categorias::create($request->all());
        return redirect()->route('caindex');
        
    }
    public function editar($categoriaId)
    {
        $categoria = Categorias::find($categoriaId);
        return view('viewsCategorias.editar', compact('categoria'));
    }

    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),
        [
            'nombre' => 'required|string|max:50'
        ]
        );
        $categoria = Categorias::find($id);
        $categoria->update($request->all());
        return redirect()->route('caindex');
    
        
    }

    public function eliminar($categoriaId)
    {
        $categoria = Categorias::find($categoriaId);
        $categoria->delete();
        return redirect()->route('caindex');
    }
}
    

