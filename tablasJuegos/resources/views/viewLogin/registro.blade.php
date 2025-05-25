<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(32, 32, 32);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background:rgb(69, 67, 67);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: whitesmoke;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: whitesmoke;
        }

        

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:#007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            align-items: center;
        }

        button:hover {
            background-color:#0056b3;;
        }
        p {
            text-align: center;
            color: whitesmoke;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

<div class="form-container">
    <h2>Registrarse</h2>
    <form action="{{ route('registro.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" >
       
        <label for="email">Correo</label>
        <input type="text" name="email" >
       
        <label for="contraseña">Contraseña</label>
        <input type="password" name="password" >
        
        <button type="submit">Registrarse</button>

        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>
    </form>
</body>
</div>
</html>