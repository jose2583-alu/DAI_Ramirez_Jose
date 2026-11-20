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
        </div>
    @endforeach
@endsection