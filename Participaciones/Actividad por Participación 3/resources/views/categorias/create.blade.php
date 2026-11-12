@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>

    <a href="{{ route('categorias.index') }}">← Volver a categorías</a>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre de la categoría:</label><br>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <br>

        <div>
            <label for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
        </div>
        <br>

        <button type="submit">Guardar Categoría</button>
    </form>
@endsection