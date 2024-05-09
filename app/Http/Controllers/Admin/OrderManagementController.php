<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class OrderManagementController extends Controller
{
    public function order_details(Request $request): View
    {
        return view('admin.order_management.order_details');
    }
    
    public function order_processing(Request $request): View
    {
        return view('admin.order_management.order_processing');
    }
    
    public function order_completed(Request $request): View
    {
        return view('admin.order_management.order_completed');
    }
}
