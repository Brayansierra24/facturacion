@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Crear Factura</h2>

    <form action="{{ route('facturas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="cliente_id" class="block font-medium text-sm">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="w-full border rounded px-3 py-2">
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="fecha" class="block font-medium text-sm">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="w-full border rounded px-3 py-2" value="{{ date('Y-m-d') }}">
        </div>

        <h3 class="text-lg font-semibold mt-6 mb-2">Productos</h3>
        <div id="productos-container" class="space-y-4">
            <div class="producto-item flex gap-4">
                <div class="flex-1">
                    <label class="block text-sm">Producto</label>
                    <select name="productos[0][producto_id]" class="w-full border rounded px-3 py-2">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ $producto->precio }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm">Cantidad</label>
                    <input type="number" name="productos[0][cantidad]" class="w-24 border rounded px-3 py-2" value="1" min="1">
                </div>
                <div class="flex items-end">
                    <button type="button" class="remove-producto bg-red-500 text-white px-3 py-1 rounded">X</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" id="add-producto" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                + Agregar Producto
            </button>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Guardar Factura
            </button>
        </div>
    </form>

    <script>
        let productoIndex = 1;

        document.getElementById('add-producto').addEventListener('click', function () {
            const container = document.getElementById('productos-container');
            const newItem = document.createElement('div');
            newItem.classList.add('producto-item', 'flex', 'gap-4', 'mt-2');
            newItem.innerHTML = `
                <div class="flex-1">
                    <label class="block text-sm">Producto</label>
                    <select name="productos[${productoIndex}][producto_id]" class="w-full border rounded px-3 py-2">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ $producto->precio }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm">Cantidad</label>
                    <input type="number" name="productos[${productoIndex}][cantidad]" class="w-24 border rounded px-3 py-2" value="1" min="1">
                </div>
                <div class="flex items-end">
                    <button type="button" class="remove-producto bg-red-500 text-white px-3 py-1 rounded">X</button>
                </div>
            `;
            container.appendChild(newItem);
            productoIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-producto')) {
                e.target.closest('.producto-item').remove();
            }
        });
    </script>
@endsection
