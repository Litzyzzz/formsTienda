<?php

namespace App\Http\Controllers;

use App\Models\Plataformas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlataformasController extends Controller
{
    public function index()
    {
        $plataformas = Plataformas::all();
        return view('viewsPlataformas.index', compact('plataformas'));
        
    }

    public function create()
    {
        return view('viewsPlataformas.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),
            [
                'nombrePlataforma' => 'required|string|max:150',
               
            ]
        );
        Plataformas::create($request->all());
        return redirect()->route('plaindex');
     
    }

    public function editar($plataformaId)
    {
        $plataforma = Plataformas::find($plataformaId);
        return view('viewsPlataformas.editar', compact('plataforma'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),
            [
                'nombrePlataforma' => 'required|string|max:150',
               
            ]
        );
        $plataforma = Plataformas::find($id);
        $plataforma->update($request->all());
        return redirect()->route('plaindex');
     
    }
    public function eliminar($plataformaId)
    {
        $plataforma = Plataformas::find($plataformaId);
        $plataforma->delete();
        return redirect()->route('plaindex');
    }
}
