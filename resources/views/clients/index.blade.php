{{-- Actividad 4: listar objetos --}}
@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td><a href="{{ route('clients.show', $client) }}">{{ $client->id }}</a></td>
                    <td>{{ $client->fullName() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $clients->links() }}

    <div class="actions">
        <a class="btn" href="{{ route('clients.create') }}">Crear cliente</a>
        <a class="btn btn--secondary" href="{{ route('home') }}">Inicio</a>
    </div>
@endsection
