<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $factura->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        .container { width: 100%; padding: 20px; }
        .header, .footer { text-align: center; }
        .datos-cliente, .detalle-factura { margin-top: 20px; width: 100%; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Factura #{{ $factura->id }}</h2>
            <p>Fecha: {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</p>
        </div>

        <div class="datos-cliente">
            <h4>Datos del Cliente</h4>
            <p><strong>Nombre:</strong> {{ $factura->cliente->nombre }}</p>
            <p><strong>Email:</strong> {{ $factura->cliente->email }}</p>
            <p><strong>Teléfono:</strong> {{ $factura->cliente->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $factura->cliente->direccion }}</p>
        </div>

        <div class="detalle-factura">
            <h4>Detalle de Productos</h4>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factura->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ number_format($detalle->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p class="total">Total: ${{ number_format($factura->total, 0, ',', '.') }}</p>
        </div>

        <div class="footer">
            <p>Gracias por su compra.</p>
        </div>
    </div>
</body>
</html>

