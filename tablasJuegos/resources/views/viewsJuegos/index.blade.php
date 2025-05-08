<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<style>
    body {
        font-family: Poppins, sans-serif;
        background-color: #f0f0f0;
        color: #333;
        margin: 0;
        padding: 20px;
        
    }
    table {
        font-family: Poppins, sans-serif;
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 800px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        overflow: hidden;
        background-color:rgb(241, 241, 242);
    }
    thead tr {
        background-color: #0f3460;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    th, td {
        padding: 15px 20px;
        
    }
    h1{
        text-align: center;
    }
    button {
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        margin: 2px;
    }
    a button {
        background-color: #4CAF50;
        color: white;
    }
    form {
        display: inline-block;
    }
    form button {
        background-color: #f44336;
        color: white;
    }

    </style>
<body>

<h1>Lista de Juegos</h1>

<table >
    <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad Disponible</th>
            <th>Imagen</th>
            <th>Género</th>
            <th>Plataforma</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($videogames as $juego)
        <tr>
            
            <td>{{ $juego->titulo }}</td>
            <td>{{ $juego->descripcion }}</td>
            <td>${{ $juego->precio }}</td>
            <td>{{ $juego->cantidad_dispo }}</td>
            <td>
          @if($juego->imagen_url)
            <img src="{{ $juego->imagen_url }}" alt="{{ $juego->titulo }}" style="max-width: 100px; max-height: 100px;">
            @else
            Sin imagen
            @endif
            </td>
            <td>{{ $juego->genero->nombre }}</td>
            <td>{{ $juego->plataforma->nombrePlataforma }}</td>
            <td>{{ $juego->proveedor->nombre }}</td>
            <td>
                <a href="{{ route('editar', $juego->juegosId) }}">
                <button type="button">Editar</button>
                </a>
                <form action="{{ route('eliminar', $juego->juegosId) }}" method="POST" >
                @csrf
                @method('DELETE')
        
                <button type="submit">Eliminar</button>
            </form>
            </td>

            


        </tr>
    @endforeach
</tbody>

    
</body>
</html>