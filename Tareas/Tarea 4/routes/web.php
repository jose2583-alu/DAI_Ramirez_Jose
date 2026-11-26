<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', [HolaController::class, 'saludoSimple']);
Route::get('/hola/{nombre}', [HolaController::class, 'saludoConNombre']);
Route::get('/hola/{nombre}/{apellido}', [HolaController::class, 'saludoConNombreApellido']);
Route::get('/hola/{nombre}/{apellido}/{edad}', [HolaController::class, 'saludoConNombreApellidoEdad']);
Route::get('/imc/{peso}/{altura}/{nombre}', [HolaController::class, 'calcularIMC']);

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);

// Etiquetas
Route::get('/etiquetas', [EtiquetaController::class, 'index'])->name('etiquetas.index');
Route::get('/etiquetas/create', [EtiquetaController::class, 'create'])->name('etiquetas.create');
Route::post('/etiquetas', [EtiquetaController::class, 'store'])->name('etiquetas.store');
Route::get('/etiquetas/{id}/edit', [EtiquetaController::class, 'edit'])->name('etiquetas.edit');
Route::put('/etiquetas/{id}', [EtiquetaController::class, 'update'])->name('etiquetas.update');
Route::delete('/etiquetas/{id}', [EtiquetaController::class, 'destroy'])->name('etiquetas.destroy');

// Contacto (Mensajes)
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::get('/contacto/create', [ContactoController::class, 'create'])->name('contacto.create');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
Route::get('/contacto/{id}/edit', [ContactoController::class, 'edit'])->name('contacto.edit');
Route::put('/contacto/{id}', [ContactoController::class, 'update'])->name('contacto.update');
Route::delete('/contacto/{id}', [ContactoController::class, 'destroy'])->name('contacto.destroy');