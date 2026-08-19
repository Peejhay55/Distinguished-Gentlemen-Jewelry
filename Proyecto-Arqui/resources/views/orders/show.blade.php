@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>{{ __('order.column_id') }}:</strong> {{ $order->id }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_date') }}:</strong> {{ $order->date->format('Y-m-d') }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_status') }}:</strong> {{ $order->status }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_shippingAddress') }}:</strong> {{ $order->shippingAddress }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_subtotal') }}:</strong> {{ $order->subtotal }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_shippingCost') }}:</strong> {{ $order->shippingCost }}</li>
        <li class="list-group-item"><strong>{{ __('order.field_totalAmount') }}:</strong> {{ $order->totalAmount }}</li>
    </ul>

    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">{{ __('order.btn_delete') }}</button>
    </form>
@endsection