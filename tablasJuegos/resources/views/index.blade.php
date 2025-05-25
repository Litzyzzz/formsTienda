<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    body {
    background-color:rgb(31, 31, 31);
    color: white;
    font-family: sans-serif;
    margin: 0;
   
}
img {
    display: block;
    margin: 0 auto;
    width: 50%;
    height: auto;
}
img:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}
.logo-hover-effect {
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    filter: brightness(1) saturate(1);
}
.logo-hover-effect:hover {
    transform: scale(1.05);
    filter: 
    brightness(1.1)
    saturate(1.2)
    hue-rotate(5deg);
    
}

.navbar {
    background-color: #1f1f1f;
    
    padding: 10px;
}

.navbar ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    margin: 0;
    padding: 0;
  
}

.navbar li a {
    text-decoration: none;
    color: white;
    font-size: 24px;
    font-weight: bold;
    
}


.navbar li a:hover {

    color:rgb(235, 223, 56);
    
    
}

footer {
    background-color: #1f1f1f;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

</style>
<body>
    

    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ route('vistaJuegos.index') }}">Juegos</a></li>
            <li><a href="{{ route('registro.create') }}">Ingresar</a></li>
        </ul>
    </nav>
    <div>
    <img src="{{ asset('imgs/vg2.png') }}" alt="logo" class="logo-hover-effect">
    </div>

   
       
    <footer>
        <p>&copy; 2025 Tienda de Videojuegos. Todos los derechos reservados.</p>
        
    </footer>
</body>
</html>
