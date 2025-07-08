@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label>Nombre *</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Teléfono</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Dirección</label>
            <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control">
        </div>
        <button class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
