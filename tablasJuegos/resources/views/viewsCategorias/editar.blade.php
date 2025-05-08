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
        padding: 20px;
        border-radius: 5px;
        border-collapse: collapse;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: auto;
        font-family: poppins, sans-serif;

    }
    
        label {
            display: block;
            margin-bottom: 10px;
        }
    
        input[type="text"],
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
</style>
<body>
<h1>Editar Categoria</h1>

<form action="{{ route('caActualizar', $categoria->categoriaId) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}"><br><br>
    
    <button type="submit">Actualizar</button>
    
</body>
</html>