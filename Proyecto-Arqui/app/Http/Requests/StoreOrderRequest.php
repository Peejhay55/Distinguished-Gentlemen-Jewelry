<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Retorna true asumiendo que la lógica de autorización se maneja 
        // en otro lugar (ej. Policies) o que cualquier usuario autenticado puede crearla.
        return true; 
    }

    public function rules(): array
    {
        return [
            'date'             => ['required', 'date'],
            'status'           => ['required', 'string', 'max:50'],
            'shippingAddress' => ['required', 'string', 'max:255'],
            'subtotal'         => ['required', 'numeric', 'min:0'],
            'shippingCost'    => ['required', 'numeric', 'min:0'],
            'totalAmount'     => ['required', 'numeric', 'min:0'],
        ];
    }
}
