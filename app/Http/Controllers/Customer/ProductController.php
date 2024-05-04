<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::with(['category', 'images'])->paginate(8);

        return view('customer.products.index', compact('products'));
    }

    public function show(Request $request, $id): View
    {
        $product = Product::with(['category', 'images', 'variants.size', 'variants.color'])->findOrFail($id);

        return view('customer.products.show', compact('product'));
    }
}
