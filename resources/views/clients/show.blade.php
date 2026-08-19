{{-- Actividad 5: ver un objeto --}}
@extends('layouts.app')

@section('title', 'Cliente #' . $client->id)

@section('content')
    <table>
        <tbody>
            <tr><th>Id</th><td>{{ $client->id }}</td></tr>
            <tr><th>Nombre</th><td>{{ $client->first_name }}</td></tr>
            <tr><th>Apellido</th><td>{{ $client->last_name }}</td></tr>
            <tr><th>Correo</th><td>{{ $client->email }}</td></tr>
            <tr><th>Contraseña</th><td>(cifrada)</td></tr>
            <tr><th>Teléfono</th><td>{{ $client->phone }}</td></tr>
            <tr><th>Dirección</th><td>{{ $client->address }}</td></tr>
            <tr><th>Rol</th><td>{{ $client->role }}</td></tr>
            <tr><th>Fecha de registro</th><td>{{ $client->registration_date->format('Y-m-d') }}</td></tr>
            <tr><th>Activo</th><td>{{ $client->active ? 'Sí' : 'No' }}</td></tr>
        </tbody>
    </table>

    <div class="actions">
        {{-- Actividad 6: borrar objeto --}}
        <form method="POST" action="{{ route('clients.destroy', $client) }}"
              onsubmit="return confirm('¿Borrar este cliente?')">
            @csrf
            @method('DELETE')
            <button class="btn btn--danger" type="submit">Borrar</button>
        </form>
        <a class="btn btn--secondary" href="{{ route('clients.index') }}">Volver al listado</a>
    </div>
@endsection
