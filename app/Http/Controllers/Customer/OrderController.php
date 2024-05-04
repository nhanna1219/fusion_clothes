<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order): View
    {
        return view('customer.orders.details', compact('order'));
    }

    public function update(OrderUpdateRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());
        return redirect()->route('customer.orders.details', $order->id);
    }
}

