<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\AboutUsController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\UserProfileController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('customer.home');
Route::get('/home', [HomeController::class, 'index'])->name('customer.home');
Route::get('/about', [AboutUsController::class, '__invoke'])->name('customer.about');
Route::get('/products', [ProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('customer.products.show');
Route::get('/cart', [CartController::class, 'index'])->name('customer.cart.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('customer.checkout.store');
Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');
// Route::get('/profile', [UserProfileController::class, 'index'])->name('customer.profile.index');
Route::get('/orders/history', [OrderController::class, 'history'])->name('customer.orders.history');
Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('customer.orders.details');

// Authenticated Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    /* Uncomment When Finish Developing Frontend

    // Checkout Process
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('customer.checkout.store');
    Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
    Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');

    // User Profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('customer.profile.index');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('customer.orders.show');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('customer.orders.history');
    */

    // Dashboard - If this is for authenticated users, place it here
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
