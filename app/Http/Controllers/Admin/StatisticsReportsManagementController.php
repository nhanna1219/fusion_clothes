<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class StatisticsReportsManagementController extends Controller
{
    public function statistics(Request $request): View
    {
        return view('admin.statistics_reports.statistics');
    }

    public function reports(Request $request): View
    {
        return view('admin.statistics_reports.reports');
    }
}
