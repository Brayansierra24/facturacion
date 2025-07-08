@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Clientes</h2>
        <a href="{{ route('clientes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Agregar Cliente
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-left">
                <tr>
                    <th class="px-4 py-3 font-medium text-gray-700">Nombre</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Email</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Teléfono</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Dirección</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($clientes as $cliente)
                    <tr>
                        <td class="px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="px-4 py-2">{{ $cliente->email }}</td>
                        <td class="px-4 py-2">{{ $cliente->telefono }}</td>
                        <td class="px-4 py-2">{{ $cliente->direccion }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>

                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No hay clientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

