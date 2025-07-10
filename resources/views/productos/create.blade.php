@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Agregar Producto</h2>

    <form action="{{ route('productos.store') }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf

        <div class="mb-4">
            <label for="nombre" class="block font-medium">Nombre</label>
            <input type="text" name="nombre" id="nombre" required class="w-full border rounded mt-1" value="{{ old('nombre') }}">
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block font-medium">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border rounded mt-1">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="precio" class="block font-medium">Precio</label>
            <input type="number" name="precio" step="0.01" required class="w-full border rounded mt-1" value="{{ old('precio') }}">
        </div>

        <div class="mb-4">
            <label for="stock" class="block font-medium">Stock</label>
            <input type="number" name="stock" required class="w-full border rounded mt-1" value="{{ old('stock') }}">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('productos.index') }}" class="mr-2 text-gray-600">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar</button>
        </div>
    </form>
@endsection
