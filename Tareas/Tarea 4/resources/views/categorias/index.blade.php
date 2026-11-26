@extends('layouts.app')

@section('content')
    <h1>Categorías del Blog de Pesca</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('categorias.create') }}" class="btn">+ Nueva Categoría</a></p>

    @foreach($categorias as $categoria)
        <div class="card">
            <h2>{{ $categoria->nombre }}</h2>
            <p>{{ $categoria->descripcion }}</p>

            <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem;">
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn" style="background: #d97706;">Editar</a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background: #dc2626;">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection