@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Productos</h2>
        <a href="{{ route('productos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Agregar Producto
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-left">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Precio</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($productos as $producto)
                    <tr>
                        <td class="px-4 py-2">{{ $producto->nombre }}</td>
                        <td class="px-4 py-2">{{ $producto->descripcion }}</td>
                        <td class="px-4 py-2">${{ number_format($producto->precio, 2) }}</td>
                        <td class="px-4 py-2">{{ $producto->stock }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('productos.edit', $producto) }}" class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay productos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
