@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Cliente</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label>Nombre *</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control">
        </div>
        <button class="btn btn-success mt-2">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
