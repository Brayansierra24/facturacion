@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cliente: {{ $cliente->nombre }}</h2>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
