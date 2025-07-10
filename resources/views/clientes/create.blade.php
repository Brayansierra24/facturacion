@extends('layouts.app')

@section('title', 'Agregar Cliente')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Agregar Cliente</h2>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                       value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                       value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" name="telefono" id="telefono"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                       value="{{ old('telefono') }}">
            </div>

            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" name="direccion" id="direccion"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                       value="{{ old('direccion') }}">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('clientes.index') }}" class="mr-3 text-sm text-gray-500 hover:text-gray-700">Cancelar</a>
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
