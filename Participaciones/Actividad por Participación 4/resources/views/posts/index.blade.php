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
        </div>
    @endforeach
@endsection