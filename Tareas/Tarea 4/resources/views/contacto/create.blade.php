@extends('layouts.app')

@section('content')
    <h1>Enviar Mensaje de Contacto</h1>
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
        <form action="{{ route('contacto.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Tu nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" rows="4" required>{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="btn">Enviar Mensaje</button>
        </form>
    </div>
@endsection