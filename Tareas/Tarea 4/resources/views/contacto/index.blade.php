@extends('layouts.app')

@section('content')
    <h1>Mensajes de Contacto</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('contacto.create') }}" class="btn">+ Enviar Mensaje</a></p>

    @foreach($mensajes as $msg)
        <div class="card">
            <h3>{{ $msg->nombre }} <small style="color: #64748b; font-weight: normal;">({{ $msg->email }})</small></h3>
            <p>{{ $msg->mensaje }}</p>

            <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem;">
                <a href="{{ route('contacto.edit', $msg->id) }}" class="btn" style="background: #d97706;">Editar</a>

                <form action="{{ route('contacto.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este mensaje?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background: #dc2626;">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection