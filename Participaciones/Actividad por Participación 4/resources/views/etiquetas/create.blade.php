@extends('layouts.app')

@section('content')
    <h1>Nueva Etiqueta</h1>
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
        <form action="{{ route('etiquetas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la etiqueta:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" name="color" id="color" value="#0284c7" required>
            </div>

            <button type="submit" class="btn">Guardar Etiqueta</button>
        </form>
    </div>
@endsection