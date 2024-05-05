<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('customer.cart.index');
    }
}
