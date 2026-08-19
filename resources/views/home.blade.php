{{-- Actividad 1: vista inicial --}}
@extends('layouts.app')

@section('title', 'Taller 01 - Clientes')

@section('content')
    <div class="actions">
        <a class="btn" href="{{ route('clients.create') }}">Crear cliente</a>
        <a class="btn btn--secondary" href="{{ route('clients.index') }}">Listar clientes</a>
    </div>
@endsection
