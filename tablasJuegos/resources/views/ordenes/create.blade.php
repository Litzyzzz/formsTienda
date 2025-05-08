<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Mi Tienda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart-fill"></i> Carrito 
                                <span class="badge bg-danger" id="cart-count">0</span>
                            </a>
                        </li>
                    </ul>
                    
                    @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->nombre }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>

    <div class="container py-5">
        <div class="row">
            <!-- Lista de Productos -->
            <div class="col-md-8">
                <h2 class="mb-4">Nuestros Productos</h2>
                <div class="row">
                    @foreach($productos as $producto)
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card">
                            <img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/300' }}" class="card-img-top product-img" alt="{{ $producto->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ Str::limit($producto->descripcion, 100) }}</p>
                                <p class="h5 text-primary">${{ number_format($producto->precio, 2) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="input-group" style="width: 120px;">
                                        <button class="btn btn-outline-secondary decrement" type="button">-</button>
                                        <input type="number" class="form-control text-center quantity-input" 
                                               data-product-id="{{ $producto->producto_id }}" 
                                               data-price="{{ $producto->precio }}"
                                               value="0" min="0" max="{{ $producto->cantidad_disponible }}">
                                        <button class="btn btn-outline-secondary increment" type="button">+</button>
                                    </div>
                                </div>
                                <small class="text-muted">Stock: {{ $producto->cantidad_disponible }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Resumen del Carrito -->
            <div class="col-md-4">
                <div class="card cart-summary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Resumen del Pedido</h5>
                    </div>
                    <div class="card-body">
                        
                        <div id="cart-items">
                            <!-- Los productos aparecerán aquí -->
                        </div>

                        <hr>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Pagar</button>


                    </div>
               
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pagar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{ route('ordenes.store') }}">
                        @csrf
                        <div class="none"id="cart-items"></div>
                     
                        <div class="mb-3">
                            <label class="form-label">Nombre en Tarjeta</label>
                            <input type="text" name="nombre_tarjeta" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Número de Tarjeta</label>
                                <input type="text" name="numero_tarjeta" class="form-control" 
                                    placeholder="4242 4242 4242 4242">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">CVV</label>
                                <input type="text" name="cvv" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiración (MM/AA)</label>
                                <input type="text" name="expiracion" class="form-control" 
                                    placeholder="12/25" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total a Pagar</label>
                                <input type="text" id="total-pagar-display" class="form-control" readonly>
                                <input type="hidden" name="total" id="total-pagar">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2" id="checkout-btn" disabled>
                            <i class="bi bi-credit-card"></i> Pagar ahora
                        </button>
                       
                        </form>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           
                        </div>
                        </div>
                    </div>
                    </div>
                     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
                                                
                
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('productos.create') }}" class="btn btn-secondary">ingresar producto</a>
   
    <script>

    // En tu archivo app.js o similar
    document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        dropdowns.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    });

        // Al inicio del script
let cart = JSON.parse(localStorage.getItem('cart')) || {};
   
    document.addEventListener('DOMContentLoaded', function() {
        // Variables para el carrito
        let cart = {};
        let subtotal = 0;
            
        // Seleccionar todos los inputs de cantidad
         
        const quantityInputs = document.querySelectorAll('.quantity-input');
        

    const updateCart = () => {
    const cartItemsContainer = document.getElementById('cart-items');
    subtotal = 0; // Quita 'let' para usar la variable global
    let itemCount = 0;
    
    cartItemsContainer.innerHTML = '';
    
    for (const productId in cart) {
        if (cart[productId].quantity > 0) {
            const item = cart[productId];
            subtotal += item.price * item.quantity;
            itemCount += item.quantity;
            
            const itemElement = document.createElement('div');
            itemElement.className = 'mb-2';
            itemElement.innerHTML = `
                <div class="d-flex justify-content-between">
                    <span>${item.name} x${item.quantity}</span>
                    <span>$${(item.price * item.quantity).toFixed(2)}</span>
                </div>
                <input type="hidden" name="productos[${productId}]" value="${item.quantity}">
            `;
            cartItemsContainer.appendChild(itemElement);
        }
    }
    
    // Actualizar totales
    document.getElementById('total-pagar').value = subtotal.toFixed(2);
    document.getElementById('total-pagar-display').value = `$${subtotal.toFixed(2)}`;
    document.getElementById('cart-count').textContent = itemCount;
    document.getElementById('checkout-btn').disabled = itemCount === 0;
    
    if (itemCount === 0) {
        cartItemsContainer.innerHTML = '<p class="text-muted">Selecciona productos para agregar al carrito</p>';
    }
};
           
            
            // Inicializar el carrito con los productos disponibles
            quantityInputs.forEach(input => {
                const productId = input.dataset.productId;
                const productCard = input.closest('.card');
                const productName = productCard.querySelector('.card-title').textContent;
                const productPrice = parseFloat(input.dataset.price);
                
                // Agregar producto al objeto carrito
                cart[productId] = {
                    name: productName,
                    price: productPrice,
                    quantity: 0
                };
                
                // Eventos para los botones de incremento/decremento
                const incrementBtn = input.nextElementSibling;
                const decrementBtn = input.previousElementSibling;
                
                incrementBtn.addEventListener('click', () => {
                    const max = parseInt(input.max);
                    if (parseInt(input.value) < max) {
                        input.value = parseInt(input.value) + 1;
                        cart[productId].quantity = parseInt(input.value);
                        updateCart();
                    }
                });
                
                decrementBtn.addEventListener('click', () => {
                    if (parseInt(input.value) > 0) {
                        input.value = parseInt(input.value) - 1;
                        cart[productId].quantity = parseInt(input.value);
                        updateCart();
                    }
                });
                
                // Evento para cambios directos en el input
                input.addEventListener('change', () => {
                    let value = parseInt(input.value);
                    const max = parseInt(input.max);
                    
                    if (isNaN(value) || value < 0) {
                        value = 0;
                    } else if (value > max) {
                        value = max;
                    }
                    
                    input.value = value;
                    cart[productId].quantity = value;
                    updateCart();
                });
            });

    document.getElementById('exampleModal').addEventListener('show.bs.modal', function() {
    // Forzar actualización del carrito al abrir el modal
    updateCart();
    
    // Asegurar que los productos se pasen al formulario
    const form = document.querySelector('#exampleModal form');
    const cartItemsContainer = form.querySelector('#cart-items');
    cartItemsContainer.innerHTML = '';
    
    for (const productId in cart) {
        if (cart[productId].quantity > 0) {
            const item = cart[productId];
            const itemElement = document.createElement('div');
            itemElement.className = 'mb-2';
            itemElement.innerHTML = `
                <div class="d-flex justify-content-between">
                    <span>${item.name} x${item.quantity}</span>
                    <span>$${(item.price * item.quantity).toFixed(2)}</span>
                </div>
                <input type="hidden" name="productos[${productId}]" value="${item.quantity}">
            `;
            cartItemsContainer.appendChild(itemElement);
        }
    }
    
    // Actualizar total en el formulario del modal
    form.querySelector('#total-pagar').value = subtotal.toFixed(2);
    form.querySelector('#total-pagar-display').value = `$${subtotal.toFixed(2)}`;
});

           
});

localStorage.setItem('cart', JSON.stringify(cart));

</script>
</body>
</html>