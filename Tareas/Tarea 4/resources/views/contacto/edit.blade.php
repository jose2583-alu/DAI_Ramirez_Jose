@extends('layouts.app')

@section('content')
    <h1>Editar Mensaje</h1>
    <p><a href="{{ route('contacto.index') }}">← Volver a mensajes</a></p>

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
        <form action="{{ route('contacto.update', $mensaje->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $mensaje->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $mensaje->email) }}" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" rows="4" required>{{ old('mensaje', $mensaje->mensaje) }}</textarea>
            </div>

            <button type="submit" class="btn">Actualizar Mensaje</button>
        </form>
    </div>
@endsection