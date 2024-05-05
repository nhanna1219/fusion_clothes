<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\AboutUsController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('customer.home');
Route::get('/home', function () {
    return redirect('/');
});

// About us
Route::get('/about', AboutUsController::class);

// Product
Route::get('/products', [ProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('customer.products.show');

// Checkout
Route::get('/momo_payment', [CheckoutController::class, 'momopayment']);
Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');

// Order
Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.details');
Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('customer.orders.update');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Authenticated Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    /* Uncomment When Finish Developing Frontend

    // Checkout Process
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
    Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('customer.checkout.store');
    Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');

    // User Profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('customer.profile.index');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.details');
    Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('customer.orders.update');

    */

    // Dashboard - If this is for authenticated users, place it here
    Route::get('/dashboard', [HomeController::class, 'index'])->name('customer.home');
});
