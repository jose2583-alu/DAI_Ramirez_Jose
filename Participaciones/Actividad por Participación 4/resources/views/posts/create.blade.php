@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Post</h1>
    <p><a href="{{ route('posts.index') }}">← Volver a posts</a></p>

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
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título (mínimo 5 caracteres):</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="body">Contenido:</label>
                <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <button type="submit" class="btn">Publicar Post</button>
        </form>
    </div>
@endsection