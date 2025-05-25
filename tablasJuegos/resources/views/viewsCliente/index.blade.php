<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catálogo de Juegos</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background:rgb(31, 31, 31);
        margin: 0;
        padding: 20px;
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
    font-weight: bold;
    font-size: 24px;
}

.navbar li a:hover {
    color:rgb(255, 251, 0);
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

        
h1{
    text-align: center;
    color: white;
    margin-bottom: 20px;
}
.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}
.game-card {
    background-color: #2c2c2c;
    border-radius: 10px;
    padding: 20px;
    width: 200px;
    text-align: center;
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
.game-card img {
    border-radius: 10px;
    margin-bottom: 10px;
     transform: scale(1.1); 
}

.game-card:hover{
    transform: scale(1.05);
    transition: transform 0.3s;
    color:rgb(251, 227, 91);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
    </style>
</head>
<body>
    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ route('vistaJuegos.index') }}">Juegos</a></li>
            <li><a href="{{ route('registro.create') }}">Ingresar</a></li>
        </ul>
    </nav>
    <h1 >Catálogo de Juegos</h1>
    <div class="cards-container">
        @foreach($videogames as $juego)
        <div class="game-card">
            @if($juego->imagen_url)
            <img src="{{ $juego->imagen_url }}" alt="{{ $juego->titulo }}" style="max-width: 100px; max-height: 100px;">
            @else
            Sin imagen
            @endif
            
            <div class="game-info">
                <h3 class="game-title">{{ $juego->titulo }}</h3>
                             
            </div>
        </div>
        @endforeach
    </div>
    <footer>
        <p>&copy; 2025 Tienda de Videojuegos. Todos los derechos reservados.</p>
        
    </footer>
</body>
</html>