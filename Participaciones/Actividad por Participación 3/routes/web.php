<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EtiquetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', [HolaController::class, 'saludoSimple']);

Route::get('/hola/{nombre}', [
    HolaController::class,
    'saludoConNombre'
]);

Route::get('/hola/{nombre}/{apellido}', [
    HolaController::class,
    'saludoConNombreApellido'
]);

Route::get('/hola/{nombre}/{apellido}/{edad}', [
    HolaController::class,
    'saludoConNombreApellidoEdad'
]);

Route::get('/imc/{peso}/{altura}/{nombre}', [
    HolaController::class,
    'calcularIMC'
]);

Route::get('/posts', [
    PostController::class,
    'index'
]);

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);

Route::get('/etiquetas', [EtiquetaController::class, 'index'])->name('etiquetas.index');