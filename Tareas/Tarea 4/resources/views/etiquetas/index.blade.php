@extends('layouts.app')

@section('content')
    <h1>Etiquetas del Blog</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('etiquetas.create') }}" class="btn">+ Nueva Etiqueta</a></p>

    @foreach($etiquetas as $etiqueta)
        <div class="card">
            <div>
                <span class="badge" style="background-color: {{ $etiqueta->color }};">
                    {{ $etiqueta->nombre }}
                </span>
                <small style="margin-left: 0.5rem; color: #64748b;">Color: {{ $etiqueta->color }}</small>
            </div>

            <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem;">
                <a href="{{ route('etiquetas.edit', $etiqueta->id) }}" class="btn" style="background: #d97706;">Editar</a>

                <form action="{{ route('etiquetas.destroy', $etiqueta->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta etiqueta?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background: #dc2626;">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection