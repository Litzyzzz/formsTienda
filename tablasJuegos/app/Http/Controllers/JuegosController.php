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
        
        if ($validacion->fails()) {
            return back()->withErrors($validacion)->withInput();
        }
        
        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->extension();
            $filename = Str::slug($request->titulo) . '-' . uniqid() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('juegos', $filename, 'public');
            $data['imagen'] = $path;
        }
        
        Juegos::create($data);
        return redirect()->route('index')->with('success', 'Juego creado exitosamente!'); 
    }

    public function editar($juegosId)
    {
        $videogames = Juegos::findOrFail($juegosId);
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plataformaId' => 'required|integer',
            'generoId' => 'required|integer',
            'proveedorId' => 'required|integer',
        ]);
        
        if ($validacion->fails()) {
            return back()->withErrors($validacion)->withInput();
        }
        
        $juego = Juegos::findOrFail($id);
        $data = $request->except('imagen');
        
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($juego->imagen && Storage::disk('public')->exists($juego->imagen)) {
                Storage::disk('public')->delete($juego->imagen);
            }
            
            // Subir nueva imagen
            $extension = $request->file('imagen')->extension();
            $filename = Str::slug($request->titulo) . '-' . uniqid() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('juegos', $filename, 'public');
            $data['imagen'] = $path;
        }
        
        $juego->update($data);
        return redirect()->route('index')->with('success', 'Juego actualizado exitosamente!');
    }

    public function eliminar($juegosId)
    {
        $juego = Juegos::findOrFail($juegosId);
        $juego->delete();
        return redirect()->route('index')->with('success', 'Juego eliminado exitosamente!');
    }
}