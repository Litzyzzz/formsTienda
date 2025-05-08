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
    input[type="file"],
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
        width: 100%;
    }

    button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        margin-bottom: 15px;
    }
</style>

<body>
<h1>Ingresar Juegos</h1>

<!-- Mostrar errores de validación -->
@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label for="titulo">Nombre del Juego</label>
    <input type="text" name="titulo" value="{{ old('titulo') }}" required>
    
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{ old('descripcion') }}" required>
    
    <label for="precio">Precio</label>
    <input type="number" step="0.01" min="0" name="precio" value="{{ old('precio') }}" required>
    
    <label for="cantidad_dispo">Cantidad Disponible</label>
    <input type="number" min="0" name="cantidad_dispo" value="{{ old('cantidad_dispo') }}" required>
    
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" accept="image/jpeg,image/png,image/jpg,image/gif" required>
    <small>Formatos aceptados: jpeg, png, jpg, gif (Máx. 2MB)</small>
    
    <label for="plataformaId">Plataforma</label>
    <select name="plataformaId" required>
        <option value="">Seleccione la plataforma</option>
        @foreach ($plataformas as $plataforma)
            <option value="{{ $plataforma->plataformaId }}" {{ old('plataformaId') == $plataforma->plataformaId ? 'selected' : '' }}>
                {{ $plataforma->nombrePlataforma }}
            </option>
        @endforeach
    </select>
    
    <label for="generoId">Categoria</label>
    <select name="generoId" required>
        <option value="">Seleccione la categoria</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->categoriaId }}" {{ old('generoId') == $categoria->categoriaId ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
    
    <label for="proveedorId">Proveedor</label>
    <select name="proveedorId" required>
        <option value="">Seleccione el proveedor</option>
        @foreach ($proveedores as $proveedor)
            <option value="{{ $proveedor->proveedorId }}" {{ old('proveedorId') == $proveedor->proveedorId ? 'selected' : '' }}>
                {{ $proveedor->nombre }}
            </option>
        @endforeach
    </select>

    <button type="submit">Guardar Juego</button>
</form>
    
</body>
</html>