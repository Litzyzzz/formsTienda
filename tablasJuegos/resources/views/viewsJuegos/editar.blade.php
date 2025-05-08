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

<form action="{{ route('editar', $videogames->juegosId) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $videogames->titulo) }}" required><br><br>
    
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" required>{{ old('descripcion', $videogames->descripcion) }}</textarea><br><br>
    
    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" step="0.01" min="0" value="{{ old('precio', $videogames->precio) }}" required><br><br>
    
    <label for="cantidad_dispo">Cantidad Disponible:</label><br>
    <input type="number" id="cantidad_dispo" name="cantidad_dispo" min="0" value="{{ old('cantidad_dispo', $videogames->cantidad_dispo) }}" required><br><br>
    
    <!-- Campo de imagen actual -->
    <div>
        <label>Imagen Actual:</label><br>
        @if($videogames->imagen)
            <img src="{{ Storage::url($videogames->imagen) }}" alt="{{ $videogames->titulo }}" style="max-width: 200px; max-height: 200px;">
            <p>{{ basename($videogames->imagen) }}</p>
        @else
            <p>No hay imagen cargada</p>
        @endif
    </div>
    
    <!-- Campo para subir nueva imagen -->
    <label for="imagen">Cambiar Imagen:</label><br>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png,image/jpg,image/gif"><br>
    <small>Formatos aceptados: jpeg, png, jpg, gif (Máx. 2MB)</small><br><br>
    
    <label for="generoId">Género:</label><br>
    <select id="generoId" name="generoId" required>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->categoriaId }}" {{ old('generoId', $videogames->generoId) == $categoria->categoriaId ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select><br><br>
    
    <label for="plataformaId">Plataforma:</label><br>
    <select id="plataformaId" name="plataformaId" required>
        @foreach($plataformas as $plataforma)
            <option value="{{ $plataforma->plataformaId }}" {{ old('plataformaId', $videogames->plataformaId) == $plataforma->plataformaId ? 'selected' : '' }}>
                {{ $plataforma->nombrePlataforma }}
            </option>
        @endforeach
    </select><br><br>

    <label for="proveedorId">Proveedor:</label><br>
    <select id="proveedorId" name="proveedorId" required>
        @foreach($proveedores as $proveedor)
            <option value="{{ $proveedor->proveedorId }}" {{ old('proveedorId', $videogames->proveedorId) == $proveedor->proveedorId ? 'selected' : '' }}>
                {{ $proveedor->nombre }}
            </option>                
        @endforeach
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
</body>
</html>