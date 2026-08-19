{{-- resources/views/orders/welcome.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('orders.create') }}" class="btn btn-primary">{{ __('order.go_to_create') }}</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">{{ __('order.go_to_list') }}</a>
    </div>
@endsection