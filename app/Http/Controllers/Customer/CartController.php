<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        if (Auth::check()) {
            $cartItems = Cart::instance('db')->content();
        } else {
            $cartItems = Cart::instance('default')->content();
        }
        $productIds = $cartItems->pluck('id')->toArray();
        $products = Product::with(['category', 'images', 'variants.size', 'variants.color'])
            ->whereIn('id', $productIds)
            ->get()
            ->keyBy('id');
        $cartDetails = $cartItems->map(function ($item) use ($products) {
            $product = $products->get($item->id);
            // dd($item->options->variant_id);
            $variant = null;
            if ($product && $product->variants) {
                $variant = $product->variants->first(function ($variant) use ($item) {
                    return ($variant->size_id == $item->options->sizeId) && ($variant->color_id == $item->options->colorId);
                });
            }
            return [
                'item' => $item,
                'product' => $product,
                'variant' => $variant,
                'size' => $variant && $variant->size ? $variant->size : null,
                'color' => $variant && $variant->color ? $variant->color : null,
            ];
        })->filter();
        // dd($cartDetails);
        return view('customer.cart.index', compact('cartDetails'));
    }

    public function updateSeletedItem(Request $request)
    {
        $rowId = $request->rowId;
        $selected = $request->selected;

        $cart = Auth::check() ? Cart::instance('db') : Cart::instance('default');
        $item = $cart->get($rowId);
        if ($item) {
            $updatedItem = $cart->update($rowId, ['options' => ['colorId' => $item->options["colorId"], 'sizeId' => $item->options["sizeId"], 'selected' => $selected]]);

            if (Auth::check()){
                $userId = Auth::id();
                Cart::instance('db')->erase($userId);
                Cart::instance('db')->store($userId);
            }
            return response()->json(['success' => true, 'rowId' => $updatedItem->rowId]);
        }

        return response()->json(['success' => false], 404);
    }

    public function updateItemQuantities(Request $request) {
        $items = $request->collect();
        $cart = Auth::check() ? Cart::instance('db') : Cart::instance('default');
        foreach ($items as $item) {
            $rowId = $item['rowId'];
            $quantity = $item['quantity'];
            $cart->update($rowId, $quantity);
        }
        $count = $this->getCartCount($request);
        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.',
            'count' => $count
        ]);
    }

    public function buyNow(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $qty = $request->input('quantity', 1);
        $colorId = $request->input('colorId');
        $sizeId = $request->input('sizeId');

        $cart = Auth::check() ? Cart::instance('db') : Cart::instance('default');

        $existingItem = $cart->search(function ($cartItem) use ($product, $colorId, $sizeId) {
            return $cartItem->id === $product->id
                && $cartItem->options->has('colorId') && $cartItem->options->colorId === $colorId
                && $cartItem->options->has('sizeId') && $cartItem->options->sizeId === $sizeId;
        });

        if ($existingItem->isNotEmpty()) {
            // Update quantity for existing item
            $firstItem = $existingItem->first();
            $rowId = $firstItem->rowId; // Get rowId of the first matching item
            $cart->update($rowId, $qty + $firstItem->qty);
            $cart->update($rowId, ['options' => ['colorId' => $colorId,'sizeId' => $sizeId,'selected' => true]]);
        } else {
            // Add new item to cart with selected option
            $cart->add($product, $qty, [
                'colorId' => $colorId,
                'sizeId' => $sizeId,
                'selected' => true,
            ]);
        }
        if (Auth::check()){
            $userId = Auth::id();
            Cart::instance('db')->erase($userId);
            Cart::instance('db')->store($userId);
        }
        return response()->json(['success' => true]);
    }

    public function getCartCount(Request $request)
    {
        $itemCount = auth()->check() ? Cart::instance('db')->count() : Cart::instance('default')->count();
        return $itemCount;
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));

        $quantity = $request->input('quantity', 1);
        $sizeId = $request->input('size');
        $colorId = $request->input('color');

        Log::info('Product Data: ' . json_encode($product->toArray()) . ', Quantity: ' . $quantity . ', Size ID: ' . $sizeId . ', Color ID: ' . $colorId);

        $existingItem = Cart::search(function ($cartItem) use ($product, $colorId, $sizeId) {
            return $cartItem->id === $product->id
                && $cartItem->options->has('colorId') && $cartItem->options->colorId === $colorId
                && $cartItem->options->has('sizeId') && $cartItem->options->sizeId === $sizeId;
        });

        if (Auth::check()) {
            // User is authenticated
            $userId = Auth::id();
            if ($existingItem->isNotEmpty()) {
                $firstItem = $existingItem->first();
                $rowId = $firstItem->rowId; // Get rowId of the first matching item
                Cart::update($rowId, $quantity + $firstItem->qty);
                Cart::update($rowId, ['options' => ['colorId' => $colorId,'sizeId' => $sizeId,'selected' => $firstItem->options["selected"]]]);
            } else {
                Cart::instance('db')->add($product, $quantity, ['sizeId' => $sizeId, 'colorId' => $colorId, 'selected' => false]);
                Log::info("Cart saving by authenticated User: " . Cart::instance('db')->content());
            }
            Cart::instance('db')->erase($userId);
            Cart::instance('db')->store($userId);
        } else {
            // User is a guest
            if ($existingItem->isNotEmpty()) {
                $firstItem = $existingItem->first();
                $rowId = $firstItem->rowId; // Get rowId of the first matching item
                Cart::update($rowId, $quantity + $firstItem->qty);
                Cart::update($rowId, ['options' => ['colorId' => $colorId,'sizeId' => $sizeId,'selected' => $firstItem->options["selected"]]]);
            } else {
                Cart::instance('default')->add($product, $quantity, ['sizeId' => $sizeId, 'colorId' => $colorId, 'selected' => false]);
            }
        }
        $itemsInCart = $this->getCartCount($request);
        return response()->json(['success' => 'Product added to cart!', 'itemsCount' => $itemsInCart]);
    }

    public function deleteItem(Request $request, $rowId)
    {
        if (Auth::check()) {
            // User is authenticated
            $userId = Auth::id();
            Cart::instance('db')->remove($rowId);
            Cart::instance('db')->erase($userId);
            Cart::instance('db')->store($userId);
        } else {
            // User is a guest
            Cart::instance('default')->remove($rowId);
        }
        return response()->json(['success' => 'Product deleted from cart!']);
    }

    public function deleteSeleted(Request $request) {
        $rowIds = $request->input('rowIds', []);
        Log::info("Delete seleted items: ". Cart::instance('db')->content());
        foreach ($rowIds as $rowId) {
            if (Auth::check()) {
                // User is authenticated
                $userId = Auth::id();
                Cart::instance('db')->remove($rowId);
                Cart::instance('db')->erase($userId);
                Cart::instance('db')->store($userId);
            } else {
                // User is a guest
                Cart::instance('default')->remove($rowId);
            }
        }

        return response()->json(['success' => true]);
    }
}
