<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<style>
    body {
        font-family: poppins, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        
    }

    form {
    background-color: #fff;
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 20px auto;
    font-family: poppins, sans-serif;

    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        font-family: poppins, sans-serif;   
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

</style>
<body>
<h1>Editar Juego</h1>

<form action=""method="POST">
    @csrf
    @method('PUT')
    
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" value="{{ $videogames->titulo }}"><br><br>
    
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion">{{ $videogames->descripcion }}</textarea><br><br>
    
    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" value="{{ $videogames->precio }}"><br><br>
    
    <label for="cantidad_dispo">Cantidad Disponible:</label><br>
    <input type="number" id="cantidad_dispo" name="cantidad_dispo" value="{{ $videogames->cantidad_dispo }}"><br><br>
    
    <label for="imagen">Imagen:</label><br>
    <input type="text" id="imagen" name="imagen" value="{{ $videogames->imagen }}"><br><br>
    
    <label for="genero_id">Género:</label><br>
    <select id="genero_id" name="genero_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->categoriaId }}" {{ $videogames->genero_id == $categoria->categoriaId ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
        @endforeach
    </select><br><br>
    
    <label for="plataforma_id">Plataforma:</label><br>
    <select id="plataforma_id" name="plataforma_id">
        @foreach($plataformas as $plataforma)
            <option value="{{ $plataforma->id }}" {{ $videogames->plataforma_id == $plataforma->id ? 'selected' : '' }}>{{ $plataforma->nombrePlataforma }}</option>
        @endforeach
    </select><br><br>

    <label for="proveedor_id">Proveedor:</label><br>
    <select id="proveedor_id" name="proveedor_id">
        @foreach($proveedores as $proveedor)
            <option value="{{ $proveedor->id }}" {{ $videogames->proveedor_id == $proveedor->id ? 'selected' : '' }}>{{$proveedor->nombre }}</option>
                
        @endforeach
    </select><br><br>

    <button type="submit">Actualizar</button>

</form>
    
</body>
</html>