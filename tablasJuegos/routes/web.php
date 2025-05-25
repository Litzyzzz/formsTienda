<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PlataformasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\vistaJuegosController;
use App\Http\Controllers\compraController;

Route::get('/', function () {
    return view('index');
});


Route::prefix('login')->group(function(){
Route::get('/', [loginController::class, 'showLoginForm'])->name('login');
// Procesar login (POST)
Route::post('/login', [loginController::class, 'login'])->name('login.post');
// Cerrar sesión
Route::post('logout', [loginController::class, 'logout'])->name('logout');

});
Route::prefix('registro')->group(function(){
Route::get('/registro/crar', [registroController::class, 'create'])->name('registro.create');
Route::post('/registro', [registroController::class, 'store'])->name('registro.store');
});

Route::prefix('compra')->group(function(){
Route::get('/ordenes/create', [compraController::class, 'create'])->name('ordenes.create');
Route::post('/ordenes', [compraController::class, 'store'])->name('ordenes.store'); 
Route::get('/ordenes', [compraController::class, 'index'])->name('ordenes.index');

});

Route::prefix('juegos')->group(function(){
Route::get('/', [JuegosController::class, 'index']) ->name('index');
Route::get('/crear', [JuegosController::class, 'create']) ->name('crear');
Route::post('/guardar', [JuegosController::class, 'guardar']) ->name('guardar');
Route::get('/editar/{id}', [JuegosController::class, 'editar']) ->name('editar');
Route::put('/editar/{id}', [JuegosController::class, 'actualizar']) ->name('actualizar');
Route::delete('/eliminar/{id}', [JuegosController::class, 'eliminar']) ->name('eliminar');
});



Route::prefix('categorias')->group(function(){
Route::get('/', [CategoriasController::class, 'index'])->name('caindex');
Route::get('/crear', [CategoriasController::class, 'create']) ->name('caCrear');
Route::post('/guardar', [CategoriasController::class, 'guardar']) ->name('caGuardar');
Route::get('/editar/{id}', [CategoriasController::class, 'editar']) ->name('caEditar');
Route::put('/editar/{id}', [CategoriasController::class, 'actualizar']) ->name('caActualizar');
Route::delete('/eliminar/{id}', [CategoriasController::class, 'eliminar']) ->name('caEliminar');

});

Route::prefix('plataformas')->group(function(){
Route::get('/', [PlataformasController::class, 'index'])->name('plaindex');
Route::get('/crear', [PlataformasController::class, 'create']) ->name('plaCrear');
Route::post('/guardar', [PlataformasController::class, 'guardar']) ->name('plaGuardar');
Route::get('/editar/{id}', [PlataformasController::class, 'editar']) ->name('plaEditar');
Route::put('/editar/{id}', [PlataformasController::class, 'actualizar']) ->name('plaActualizar');
Route::delete('/eliminar/{id}', [PlataformasController::class, 'eliminar']) ->name('plaEliminar');
});

Route::prefix('proveedores')->group(function(){
Route::get('/', [ProveedoresController::class, 'index'])->name('proindex');
Route::get('/crear', [ProveedoresController::class, 'create']) ->name('proCrear');
Route::post('/guardar', [ProveedoresController::class, 'guardar']) ->name('proGuardar');
Route::get('/editar/{id}', [ProveedoresController::class, 'editar']) ->name('proEditar');
Route::put('/editar/{id}', [ProveedoresController::class, 'actualizar']) ->name('proActualizar');
Route::delete('/eliminar/{id}', [ProveedoresController::class, 'eliminar']) ->name('proEliminar');

});

Route::prefix('vistaJuegos')->group(function(){
Route::get('/juegos', [vistaJuegosController::class, 'index']) ->name('vistaJuegos.index');
});

