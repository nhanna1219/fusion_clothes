<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('customer.cart.index');
    }


    public function show(Request $request, $id): View
    {
        $product = Product::with(['category', 'images', 'variants.size', 'variants.color'])->findOrFail($id);
        $selectedColor = $request->query('selected_color');
        $selectedSize = $request->query('selected_size');
        $quantity = $request->query("selected_quantity");

        return view('customer.cart.buynow', compact('product', 'selectedColor', 'selectedSize', 'quantity'));
    }
}
