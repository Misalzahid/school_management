<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::orderBy('id', 'DESC')->get();
        $totalAmount = 0;
        foreach ($orders as $order) {
            $totalAmount += $order->total_amount;
        }


        return view('admin.order.index', compact('orders','totalAmount'));

    }

    /*update status of order */
    public function status($id)
    {
        $order = Order::find($id);
        $order->update(['status' => $order->status == 'pending' ? 'approved' : 'pending']);
        return redirect()->back()->with(['status' => true, 'message' => 'Status Updated sucessfully']);
    }

    public function show(Request $request)
    {

        $data = Order::with('orderItem', 'orderAddress')->find($request->id);
        // return $data;
        $product = view('admin.order.model', compact('data'))->render();
        return response()->json($product);

    }
}
