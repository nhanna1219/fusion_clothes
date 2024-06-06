<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\AboutUsController;
use App\Http\Controllers\Customer\ContactUsController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('customer.home');
Route::get('/home', [HomeController::class, 'index'])->name('customer.home');
Route::get('/about', [AboutUsController::class, '__invoke'])->name('customer.about');
Route::get('/contact', [ContactUsController::class, 'index'])->name('customer.contact');
Route::get('/products', [ProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('customer.products.details');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('customer.cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('customer.cart.add');
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteItem'])->name('customer.cart.delete');
Route::post('/cart/delete-cart-items', [CartController::class, 'deleteSeleted'])->name('customer.cart.deleteSeleted');

Route::post('/buynow/{id}', [CartController::class, 'buyNow'])->name('customer.cart.buynow');
Route::post('/cart/update-selected-item', [CartController::class, 'updateSeletedItem'])->name('customer.cart.updateSeletedItem');
Route::post('/cart/update-quantities', [CartController::class, 'updateItemQuantities'])->name('customer.cart.updateItemQuantities');

// Custom Login
Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])->name('login');

// Authenticated Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('customer.checkout.placeOrder');
    Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
    Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');

    Route::post('/logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Order
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.details');
    Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('customer.orders.update');
});
