<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public const ROLES = ['admin', 'customer', 'seller'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'registration_date',
        'active',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'registration_date' => 'date',
            'active' => 'boolean',
        ];
    }

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
