<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleFactura;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'fecha', 'total'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function detalles()
{
    return $this->hasMany(DetalleFactura::class);
}

}



