@extends('layouts.app')

@section('content')
    <h1>Nueva Categoría</h1>
    <p><a href="{{ route('categorias.index') }}">← Volver a categorías</a></p>

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
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la categoría (mínimo 4 caracteres):</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit" class="btn">Guardar Categoría</button>
        </form>
    </div>
@endsection