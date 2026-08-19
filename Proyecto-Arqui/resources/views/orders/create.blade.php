@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_date') }}</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_status') }}</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_shipping_address') }}</label>
            <input type="text" name="shippingAddress" class="form-control" value="{{ old('shippingAddress') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_subtotal') }}</label>
            <input type="number" step="0.01" name="subtotal" class="form-control" value="{{ old('subtotal') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_shipping_cost') }}</label>
            <input type="number" step="0.01" name="shippingCost" class="form-control" value="{{ old('shippingCost') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('order.field_total_amount') }}</label>
            <input type="number" step="0.01" name="totalAmount" class="form-control" value="{{ old('totalAmount') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('order.btn_save') }}</button>
    </form>
@endsection