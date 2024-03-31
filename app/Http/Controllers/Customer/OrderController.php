<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders for the logged-in user or for an admin view
        return view('customer.orders.index');
    }
    public function show(string $id)
    {
        return view('customer.orders.details');
    }
    public function history(){
        return view('customer.orders.history');
    }
}
