@extends('layouts.app')

@section('content')
    <h1>Editar Post</h1>
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
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título (5 a 120 caracteres):</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Contenido:</label>
                <textarea name="body" id="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="btn">Actualizar Post</button>
        </form>
    </div>
@endsection