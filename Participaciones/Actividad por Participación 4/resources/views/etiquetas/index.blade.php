@extends('layouts.app')

@section('content')
    <h1>Etiquetas del Blog</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('etiquetas.create') }}" class="btn">+ Nueva Etiqueta</a></p>

    @foreach($etiquetas as $etiqueta)
        <div class="card">
            <span class="badge" style="background-color: {{ $etiqueta->color }};">
                {{ $etiqueta->nombre }}
            </span>
            <small style="margin-left: 0.5rem; color: #64748b;">Color: {{ $etiqueta->color }}</small>
        </div>
    @endforeach
@endsection