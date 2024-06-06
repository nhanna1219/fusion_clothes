<?php

namespace App\Http\Controllers\Auth;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as BaseAuthenticatedSessionController;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;

class CustomAuthenticatedSessionController extends BaseAuthenticatedSessionController
{
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            $userId = Auth::id();
            // Merge the guest cart with the restored user cart
            Cart::instance('default')->merge($userId, true, true, true, 'db');

            // Reset db instance
            Cart::instance('db')->erase($userId);
            Cart::instance('db')->destroy();
            foreach (Cart::instance('default')->content() as $item) {
                Cart::instance('db')->add($item->id, $item->name, $item->qty, $item->price, 0, ["sizeId" => $item->options->sizeId, "colorId" => $item->options->colorId, "selected" => $item->options->selected]);
            }
            Cart::instance('default')->destroy();
            Cart::instance('db')->store($userId);

            return app(LoginResponse::class);
        });
    }
    public function destroy(Request $request): LogoutResponse
    {
        $cartContent = collect();
        if (Auth::check()) {
            $userId = Auth::id();
            $cartContent = Cart::instance('db')->content();
        }

        $this->guard->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        if (!config('cart.destroy_on_logout')) {
            $userId = Auth::id();
            foreach ($cartContent as $rowId => $item) {
                Cart::instance('db')->add($item->id, $item->name, $item->qty, $item->price, 0, ["sizeId" => $item->options->sizeId, "colorId" => $item->options->colorId, "selected" => $item->options->selected]);
            }
            Log::info("Cart saving by authenticated User Logged out: " .Cart::instance('db')->content());
            Cart::instance('db')->erase($userId);
            Cart::instance('db')->store($userId);
        }

        Cart::instance('db')->destroy();

        return app(LogoutResponse::class);
    }
}
