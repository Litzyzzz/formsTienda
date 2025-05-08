<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Categoria</title>
</head>
<body>
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
    input[type="text"]{
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;

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
<h1>Ingresar Categoria</h1>

<form action="{{ route('caGuardar') }}" method="POST">

@csrf
    
        <label for="nombre">Nombre de la Categoria</label>
        <input type="text" name="nombre"  required>
        
    
        <button type="submit">Guardar</button>

</form>
    
</body>
</html>