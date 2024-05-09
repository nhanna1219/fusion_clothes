<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class CustomerManagementController extends Controller
{
    public function customer_list(Request $request): View
    {
        return view('admin.customer_management.customer_list');
    }

}
