@extends('layouts.app')

@section('title', 'Facturas')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Facturas</h2>
        <a href="{{ route('facturas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Nueva Factura
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-left">
                <tr>
                    <th class="px-4 py-3 font-medium text-gray-700">#</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Cliente</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Fecha</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Total</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($facturas as $factura)
                    <tr>
                        <td class="px-4 py-2">{{ $factura->id }}</td>
                        <td class="px-4 py-2">{{ $factura->cliente->nombre }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">${{ number_format($factura->total, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Ver</a>
                            <a href="{{ route('facturas.pdf', $factura->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm" target="_blank">
                                Imprimir
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No hay facturas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
