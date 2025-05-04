<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Juegos</title>
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
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: auto;



    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        
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
<h1>Ingresar Juegos</h1>

<form action="{{ route('guardar') }}" method="POST">
    @csrf
    
    <label for="titulo">Nombre del Juego</label>
    <input type="text" name="titulo"  required>
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" name="descripcion"  required>
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" name="precio"  required>
    <label for="cantidadDsipo">Cantidad Disponible</label>
    <input type="number" name="cantidad_dispo"  required>
    <label for="img">Imagen</label>
    <input type="file" name="imagen"  required>
    <label for="plataformaId">Plataforma</label>
    <select name="plataformaId" >
        <option value="">Seleccione la plataforma</option>
        @foreach ($plataformas as $plataforma)
            <option value="{{ $plataforma->plataformaId }}">{{ $plataforma->nombrePlataforma }}</option>
        @endforeach
    </select>
    <label for="generoId">Categoria</label>
    <select name="generoId" >
        <option value="">Seleccione la categoria</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->categoriaId }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    <label for="proveedorId">Proveedor</label>
    <select name="proveedorId" >

        <option value="">Seleccione el proveedor</option>
        @foreach ($proveedores as $proveedor)
            <option value="{{ $proveedor->proveedorId }}">{{ $proveedor->nombre }}</option>
        @endforeach
    </select>

    
    <button type="submit">Guardar Juego</button>

    

</form>
    
</body>
</html>