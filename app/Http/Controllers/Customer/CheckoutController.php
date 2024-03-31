<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    public function index()
    {
        // if (!Auth::check()) {
        //     // User is not logged in, redirect to login page
        //     return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        // }
        return view('customer.checkout.index');
    }
    public function confirmation()
    {
        return view('customer.checkout.confirmation');
    }
    public function friendlyThanks(){
        return view('customer.checkout.friendlyThanks');
    }
}
