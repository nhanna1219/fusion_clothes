<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class ProductManagementController extends Controller
{
    public function product_list(Request $request): View
    {
        return view('admin.product_management.product_list');
    }

    public function add_product(Request $request): View
    {
        return view('admin.product_management.add_product');
    }

    public function edit_product(Request $request): View
    {
        return view('admin.product_management.edit_product');
    }
}
