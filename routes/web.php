<?php

use App\Http\Controllers\Admin\CustomerManagementController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\Admin\StatisticsReportsManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\AboutUsController;
use App\Http\Controllers\Customer\ContactUsController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CartController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('customer.home');
Route::get('/home', [HomeController::class, 'index'])->name('customer.home');
Route::get('/about', [AboutUsController::class, '__invoke'])->name('customer.about');
Route::get('/contact', [ContactUsController::class, 'index'])->name('customer.contact');
Route::get('/products', [ProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('customer.products.details');

// Cart
Route::get('/cart', CartController::class);

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

    // Checkout
    Route::get('/momo_payment', [CheckoutController::class, 'momopayment']);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('customer.checkout.confirmation');
    Route::get('/checkout/thank-you', [CheckoutController::class, 'friendlyThanks'])->name('customer.checkout.friendlyThanks');

    // Order
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.details');
    Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('customer.orders.update');
});

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','admin'])->group(function () {
 

    


//Product Management
// Route::get('/admin', [ProductManagementController::class, 'product_list'])->name('admin.product_management.product_list');
// Route::get('/admin/product_list', function () {
//     return redirect('/admin');
// });
// Route::get('/admin/add_product', [ProductManagementController::class, 'add_product'])->name('admin.product_management.add_product');
// Route::get('/admin/edit_product', [ProductManagementController::class, 'edit_product'])->name('admin.product_management.edit_product');

// //Customer Management
// Route::get('/admin/customer_list', [CustomerManagementController::class, 'customer_list'])->name('admin.customer_management.customer_list');

// //Order Management
// Route::get('/admin/order_processing', [OrderManagementController::class, 'order_processing'])->name('admin.order_management.order_processing');
// Route::get('/admin/order_completed', [OrderManagementController::class, 'order_completed'])->name('admin.order_management.order_completed');
// Route::get('/admin/order_details', [OrderManagementController::class, 'order_details'])->name('admin.order_management.order_details');

// //Statistics
// Route::get('/admin/statistics', [StatisticsReportsManagementController::class, 'statistics'])->name('admin.statistics_reports.statistics');

// //Reports
// Route::get('/admin/reports', [StatisticsReportsManagementController::class, 'reports'])->name('admin.statistics_reports.reports');
// // });