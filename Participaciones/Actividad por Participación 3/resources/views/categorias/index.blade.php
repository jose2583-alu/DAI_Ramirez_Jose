@extends('layouts.app')

@section('content')
    <h1>Categorías del Blog de Pesca</h1>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('categorias.create') }}">+ Nueva Categoría</a>

    <hr>

    @foreach($categorias as $categoria)
        <article>
            <h2>{{ $categoria->nombre }}</h2>
            <p>{{ $categoria->descripcion }}</p>
        </article>
        <hr>
    @endforeach
@endsection