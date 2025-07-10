@extends('layouts.app')

@section('title', 'Factura #'.$factura->id)

@section('content')
    <div class="bg-white shadow p-6 rounded">
        <h2 class="text-2xl font-bold mb-4">Factura #{{ $factura->id }}</h2>

        <p><strong>Cliente:</strong> {{ $factura->cliente->nombre }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-2">Detalles:</h3>
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Producto</th>
                        <th class="border px-4 py-2">Cantidad</th>
                        <th class="border px-4 py-2">Precio Unitario</th>
                        <th class="border px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factura->detalles as $detalle)
                        <tr>
                            <td class="border px-4 py-2">{{ $detalle->producto->nombre }}</td>
                            <td class="border px-4 py-2">{{ $detalle->cantidad }}</td>
                            <td class="border px-4 py-2">${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">${{ number_format($detalle->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-4">
                <p class="text-lg font-bold">Total: ${{ number_format($factura->total, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('facturas.index') }}" class="text-blue-600 hover:underline">← Volver</a>
            <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                Imprimir
            </button>
        </div>
    </div>
@endsection
