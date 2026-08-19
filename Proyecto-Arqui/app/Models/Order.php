<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'date',
        'status',
        'shippingAddress', 
        'subtotal',
        'shippingCost',   
        'totalAmount',     
    ];

    // Casteo de tipos para asegurar que los datos se manejen correctamente
    protected $casts = [
        'date'          => 'date',
        'subtotal'      => 'double', // Nota: para monedas suele ser más seguro usar 'decimal:2'
        'shippingCost' => 'double',
        'totalAmount'  => 'double',
    ];

    /**
     * Encapsula la obtención del listado resumido, así el controlador
     * no manipula la consulta directamente.
     */
    public static function listSummary(): \Illuminate\Database\Eloquent\Collection
    {
        // Se reemplazó 'order_number' (que ya no existe) por campos útiles para un resumen
        return self::query()->select(['id', 'date', 'status', 'totalAmount'])->get();
    }
}