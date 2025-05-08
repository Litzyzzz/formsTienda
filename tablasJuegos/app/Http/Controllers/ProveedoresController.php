<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedores::all();
        return view('viewsProveedores.index', compact('proveedores'));
        
    }

    public function create()
    {
        return view('viewsProveedores.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'direcciom' => 'required|string|max:255',

        ]);

        Proveedores::create($request->all());
        return redirect()->route('proindex');
    }

    public function editar($proveedorId)
    {
        $proveedores = Proveedores::find($proveedorId);
        return view('viewsProveedores.editar', compact('proveedores'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'direcciom' => 'required|string|max:255',

        ]);

        $proveedores = Proveedores::find($id);
        $proveedores->update($request->all());
        return redirect()->route('proindex');
    }
    public function eliminar($proveedorId)
    {
        $proveedores = Proveedores::find($proveedorId);
        $proveedores->delete();
        return redirect()->route('proindex');
    }
}
