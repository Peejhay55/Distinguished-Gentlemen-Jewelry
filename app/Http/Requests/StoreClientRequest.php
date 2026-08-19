<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:120', Rule::unique('clients', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:60', 'confirmed'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'address' => ['required', 'string', 'max:150'],
            'role' => ['required', Rule::in(Client::ROLES)],
            'registration_date' => ['required', 'date', 'before_or_equal:today'],
            'active' => ['required', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'active' => $this->boolean('active'),
        ]);
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'nombre',
            'last_name' => 'apellido',
            'email' => 'correo',
            'password' => 'contraseña',
            'phone' => 'teléfono',
            'address' => 'dirección',
            'role' => 'rol',
            'registration_date' => 'fecha de registro',
            'active' => 'estado',
        ];
    }
}
