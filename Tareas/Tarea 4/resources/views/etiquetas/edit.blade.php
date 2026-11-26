@extends('layouts.app')

@section('content')
    <h1>Editar Etiqueta</h1>
    <p><a href="{{ route('etiquetas.index') }}">← Volver a etiquetas</a></p>

    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('etiquetas.update', $etiqueta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la etiqueta (3 a 50 caracteres):</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $etiqueta->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" name="color" id="color" value="{{ old('color', $etiqueta->color) }}" required>
            </div>

            <button type="submit" class="btn">Actualizar Etiqueta</button>
        </form>
    </div>
@endsection