<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

        h1 {
            
            text-align: center;
            color: whitesmoke;
        }

        form {
            background:rgb(69, 67, 67);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        div {
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
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
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

        span {
            font-size: 12px;
        }
    </style>
    

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        <h1>Iniciar Sesión</h1>
        @csrf <!-- Token de seguridad de Laravel -->

        <div>
            <label for="email">Correo electrónico:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                required 
                value="{{ old('email') }}">
            
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
            >
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Ingresar</button>
         <!-- Opcional: Enlace a registro -->
    <p>¿No tienes cuenta? <a href="{{ route('registro.create') }}">Regístrate aquí</a></p>
    </form>

   
</body>
</html>