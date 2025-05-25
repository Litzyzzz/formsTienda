<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\{orden, pedido, Juegos, pago,usuario};

class compraController extends Controller
{
    public function create()
    {
        $videogames = Juegos::all();
        return view('ordenes.create', compact('videogames'));
    }
    public function store(Request $request)
    {
        if (!Auth::check()) { //usé Auth::check() para verificar si el usuario est autenticado
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar una compra');
        }
    
        // Validar que hay productos en el carrito
        if (empty($request->videogames)) {
            return back()->with('error', 'No hay productos en el carrito');
        }
    
        // Crear orden
        $orden = Orden::create([
            'usuario_Id' => Auth::usuario_Id(), // Cambié a Auth::usuario_Id()->id y tenia auth()->id()
            'total' => $request->total
        ]);
    
        $total = 0;
        foreach ($request->videogames as $juegosId => $cantidad) {
            if ($cantidad > 0) {
                $videogames = Juegos::find($juegosId);
                
                if (!$videogames) {
                    continue;
                }
    
                // Verificar stock disponible
                if ($videogames->cantidad_dispo < $cantidad) {
                    return back()->with('error', "No hay suficiente stock para {$videogames->titulo}");
                }
    
                Pedido::create([
                    'orden_Id' => $orden->orden_Id,
                    'juegosId' => $juegosId,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $videogames->precio
                ]);
    
                $total += $videogames->precio * $cantidad;
                $videogames->decrement('cantidad_dispo', $cantidad);
            }
        }
    
        // Crear pago
        Pago::create([
            'orden_Id' => $orden->orden_Id,
            'monto' => $total,
            'tarjeta_ultimos' => substr($request->numero_tarjeta, -4),
        ]);
    
        // Limpiar carrito
        echo "<script>localStorage.removeItem('cart');</script>";
    
        return redirect()->route('ordenes.index')->with('success', 'Pedido y pago registrados!');
    }
    public function index()
    {
        $videogames= Juegos::all();
        $usuario = usuario::all();
         // Relación en singular
        $pagos = Pago::all();
        $pedidos = Pedido::with(['Juegos', 'orden'])->get();
        $ordenes = orden::with('usuario')->get(); 


        return view('ordenes.index', compact('ordenes' , 'videogames','pedidos', 'pagos', 'usuario'));
    }

}
