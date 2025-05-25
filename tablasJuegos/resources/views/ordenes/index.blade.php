<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="{{ route('ordenes.create') }}" class="btn btn-secondary">hacer Pedido</a>

    <div class="container mt-5">
        <h1>Pedidos Realizados</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $orden)
                <tr>
                    <td>{{ $orden->orden_id }}</td>
                    <td>{{ $orden->usuario->nombre}}</td>
                    <td>${{ number_format($orden->total, 2) }}</td>
                    <td>{{ $orden->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <div class="container mt-5">
        <h1>productos en tienda</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad Disponible</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videogames as $producto)
                <tr>
                    <td>{{ $producto->producto_id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->cantidad_disponible}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <div class="container mt-5">
        <h1>pedidos Realizados</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Orden</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>Orden #{{ $pedido->orden_id }} - {{ $pedido->orden->usuario->nombre }}</td>
                    <td>{{ $pedido->producto->nombre }}</td> <!-- Asumiendo que el modelo Producto tiene un campo 'nombre' -->
                    <td>{{ $pedido->cantidad }}</td>
                    <td>${{ number_format($pedido->precio_unitario, 2) }}</td>
                    <td>${{ number_format($pedido->precio_unitario * $pedido->cantidad, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <br>
    <div class="container mt-5">
        <h1>pagos</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre cliente</th>
                    <th>monto</th>
                    <th>numero targeta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->pago_id}}</td>
                    <td>{{ $pago->orden->usuario->nombre }}</td>
                    <td>${{ number_format($pago->monto, 2) }}</td>
                    <td>{{ $pago-> tarjeta_ultimos }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

<br>
    <div class="container mt-5">
        <h1>usuarios</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuario as $usuarios)
                <tr>
                    <td>{{ $usuarios->usuario_id}}</td>
                    <td>{{ $usuarios->nombre}}</td>
                    <td>{{ $usuarios->email}}</td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


    
</body>
</html>