<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        Debugbar::info(Cart::count());
        Debugbar::info(Cart::instance('default')->content());
        // Cart::destroy();
        Debugbar::info(Cart::instance('db')->content());
        // Cart::instance('db')->destroy();
        // Retrieve all items in the cart
        // $cartItems = Cart::instance('default')->content();
        // Cart::instance('db')->erase(1);
        // $request->session()->forget('cart');

        // Loop through the items and display them

        $products = Product::with(['category', 'images'])->inRandomOrder()->get();
        return view('customer.home.index', compact('products'));
    }
}
