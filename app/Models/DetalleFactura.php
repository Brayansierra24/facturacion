<?php

// app/Models/DetalleFactura.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $fillable = ['factura_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
