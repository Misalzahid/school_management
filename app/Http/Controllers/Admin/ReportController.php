<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function getReports()
    {
        $currentDate = Carbon::now();
        // Get orders for the current date (daily)
        $dailyOrders = Order::
            wheredate('created_at', $currentDate)
            ->get();
        // Get orders for the current date (weekly)
        $weeklyOrders = Order::whereBetween('created_at',
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get();

        // Get orders for the current month (monthly)
        $monthlyOrders = Order::whereYear('created_at', $currentDate->year)
            ->whereMonth('created_at', $currentDate->month)
            ->get();

        // // Get orders for the current yearly (yearly)
        $yearlyOrders = Order::whereYear('created_at', $currentDate->year)
            ->get();

        // return [
        //     'daily' => $dailyOrders,
        //     'weekly' => $weeklyOrders,
        //     'monthly' => $monthlyOrders,
        //     'yearly' => $yearlyOrders,
        // ];
        return view('admin.reports.index', compact('dailyOrders','weeklyOrders', 'monthlyOrders', 'yearlyOrders'));
    }
}
