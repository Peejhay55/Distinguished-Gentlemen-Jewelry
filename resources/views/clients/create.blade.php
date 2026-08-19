{{-- Actividad 2: formulario de creación --}}
@extends('layouts.app')

@section('title', 'Crear cliente')

@section('content')
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <x-form-field name="first_name" label="Nombre" required />
        <x-form-field name="last_name" label="Apellido" required />
        <x-form-field name="email" label="Correo" type="email" required />
        <x-form-field name="password" label="Contraseña" type="password" required />
        <x-form-field name="password_confirmation" label="Confirmar contraseña" type="password" required />
        <x-form-field name="phone" label="Teléfono" type="tel" required />
        <x-form-field name="address" label="Dirección" required />

        <div class="field">
            <label for="role">Rol</label>
            <select id="role" name="role" required>
                <option value="">Seleccione...</option>
                @foreach ($roles as $role)
                    <option value="{{ $role }}" @selected(old('role') === $role)>{{ $role }}</option>
                @endforeach
            </select>
            @error('role')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <x-form-field
            name="registration_date"
            label="Fecha de registro"
            type="date"
            :value="old('registration_date', now()->toDateString())"
            required
        />

        <div class="field">
            <label for="active">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" id="active" name="active" value="1" @checked(old('active', true))>
                Activo
            </label>
            @error('active')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="actions">
            <button class="btn" type="submit">Guardar</button>
            <a class="btn btn--secondary" href="{{ route('home') }}">Cancelar</a>
        </div>
    </form>
@endsection
