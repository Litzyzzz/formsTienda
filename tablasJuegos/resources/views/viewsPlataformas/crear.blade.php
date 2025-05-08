<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Plataforma</title>
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
<body>
<h1>Ingresar Tipo de Plataforma</h1>

<form action="{{ route('plaGuardar') }}" method="post">
    @csrf

<Label for="">Tipo de Plataforma</Label>
<input type="text" name="nombrePlataforma"  required>
<button type="submit">Guardar</button>


</form>

</body>
</html>