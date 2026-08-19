@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    @if ($orders->isEmpty())
        <p>{{ __('order.no_orders_found') }}</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('order.column_id') }}</th>
                    <th>{{ __('order.column_date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                        <td>{{ $order->date->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection