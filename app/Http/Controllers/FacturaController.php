<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with('cliente')->latest()->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('facturas.create', compact('clientes', 'productos'));
    }

    public function show(Factura $factura)
{
    return view('facturas.show', compact('factura'));
}


    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        $factura = Factura::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => $request->fecha,
            'total' => 0,
        ]);

        $total = 0;

        foreach ($request->productos as $detalle) {
            $producto = Producto::findOrFail($detalle['producto_id']);
            $cantidad = $detalle['cantidad'];
            $precio = $producto->precio;
            $subtotal = $cantidad * $precio;

            DetalleFactura::create([
                'factura_id' => $factura->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_unitario' => $precio,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $factura->update(['total' => $total]);

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    public function imprimir(Factura $factura)
    {
        $factura->load('cliente', 'detalles.producto');

        $pdf = Pdf::loadView('facturas.pdf', compact('factura'));
        return $pdf->stream('factura_' . $factura->id . '.pdf');
    }
}
