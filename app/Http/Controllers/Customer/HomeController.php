<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'images'])->get();
        // Debugbar::info($products);
        return view('customer.home.index', compact('products'));
    }
}
