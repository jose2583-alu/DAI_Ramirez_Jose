@extends('layouts.app')

@section('content')
    <h1>Artículos de Pesca</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('posts.create') }}" class="btn">+ Nuevo Post</a></p>

    @foreach($posts as $post)
        <div class="card">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            @if($post->created_at)
                <small style="color: #64748b;">Publicado el {{ $post->created_at->format('d/m/Y') }}</small>
            @endif

            <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem;">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn" style="background: #d97706;">Editar</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background: #dc2626;">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection