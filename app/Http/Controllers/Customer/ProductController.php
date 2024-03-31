<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('customer.products.details');
    }
}
