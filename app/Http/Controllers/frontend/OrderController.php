<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Models\Varient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $total = 0;
        foreach((array) session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }
        $order = new Order();
        $order->code = random_int(10000000, 99999999);
        $order->status = 'pending';
        $order->payment = 'cash on delivery';
        $order->total_amount = $total;
        $order->save();

        $oredrId = $order->id;

        $orderAddress = new OrderAddress();
        $orderAddress->order_id = $oredrId;
        $orderAddress->country = $request->country;
        $orderAddress->f_name = $request->f_name;
        $orderAddress->l_name = $request->l_name;
        $orderAddress->email = $request->email;
        $orderAddress->address = $request->address;
        $orderAddress->state = $request->state;
        $orderAddress->city = $request->city;
        $orderAddress->postal_code = $request->postal_code;
        $orderAddress->phone_no = $request->phone_no;
        $orderAddress->save();

        foreach((array) session('cart') as $id => $details){
            $varient = Varient::find($id);
            $orderItem = new OrderItem();
            $orderItem->order_id = $oredrId;
            $orderItem->quantity = $details['quantity'];
            $orderItem->name = $details['name'];
            $orderItem->varient_id = $id;
            $orderItem->product_id = $varient->product_id;
            $orderItem->sub_total = $total;
            $orderItem->save();

        }


        return redirect()->route('order')->with(['status' => true, 'message' => 'Created Successfully']);
    }

}
