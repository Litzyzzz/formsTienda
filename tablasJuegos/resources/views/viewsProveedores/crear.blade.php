<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
    input[type="tel"],
    input[type="email"],
    input[type="text"] {
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
<h1>Ingresar Proveedor</h1>

<form action="{{ route('proGuardar') }}" method="post">
    @csrf

<Label for="nombre">Nombre Proveedor</Label>
<input type="text" name="nombre"  required>
<Label for="telefono">Telefono Proveedor</Label>
<input type="text" name="telefono"  required>
<Label for="correo">Correo Proveedor</Label>
<input type="text" name="correo"  required>
<Label for="direcciom">Direccion Proveedor</Label>
<input type="text" name="direcciom"  required>

<button type="submit">Guardar</button>

</form>    
</body>
</html>