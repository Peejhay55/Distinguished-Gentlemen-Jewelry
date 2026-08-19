<?php

// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function welcome(): View
    {
        $viewData = [
            'title' => __('order.welcome_title'),
        ];

        return view('orders.welcome', $viewData);
    }

    public function create(): View
    {
        $viewData = [
            'title' => __('order.create_title'),
        ];

        return view('orders.create', $viewData);
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        Order::create($request->validated());

        return redirect()
            ->route('orders.index')
            ->with('success', __('order.created_successfully'));
    }

    public function index(): View
    {
        $viewData = [
            'title'  => __('order.list_title'),
            'orders' => Order::listSummary(),
        ];

        return view('orders.index', $viewData);
    }

    public function show(Order $order): View
    {
        $viewData = [
            'title' => __('order.detail_title'),
            'order' => $order,
        ];

        return view('orders.show', $viewData);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', __('order.deleted_successfully'));
    }
}