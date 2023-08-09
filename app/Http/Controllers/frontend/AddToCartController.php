<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Varient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {
        // $userId = Auth()->guard('user')->id();
        // if (!$userId) {
        //     // dd('jyfjygukg');
        //     return response()->json(['success' => true, 'message' => 'Please login before adding to cart!', 'userId' => null]);
        // }

        if (session()->has('cart.' . $request->id)) {
            $data = count((array) session('cart'));
            $cart = (array) session('cart');
            return response()->json(['error' => true, 'message' => 'Product already in cart!', 'data' => $data, 'cart' => $cart]);
        } else {
            $varient = Varient::with('product')->findOrFail($request->id);
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity']++;
            } else {
                $cart[$request->id] = [
                    "name" => $varient->product->name,
                    "quantity" => $request->qty,
                    "price" => $varient->price,
                    "varient_id" => $varient->id,
                    "image" => $varient->product->image
                ];
            }

            session()->put('cart', $cart);
            $data = count((array) session('cart'));

            $cart = (array) session('cart');

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!', 'data' => $data, 'cart' => $cart]);
        }
    }

    // method use for remove product from session
    public function remove(Request $request)
    {
        // return $request->id;
        if ($request->id) {
            $cart = session()->get('cart');
            // return $cart;
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $cart = session('cart');
            $data = count((array) session('cart'));
            return response()->json(['success' => true, 'message' => 'Product remove to cart successfully!', 'cart' => $cart, 'data' => $data]);
        }
    }
    public function addToCarts(Request $request)
    {
        $product = Product::with('varients')->findOrFail($request->id);
        // return $product;
        $image = $product->varients->first();
        $cart = session()->get('cart', []);
        // return $cart;

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "name" => $product->name,
                "quantity" => $request->qty,
                "price" => $product->price,
                "vendor_id" => $product->vendor_id,
                "image" => $image->image
            ];
        }

        session()->put('cart', $cart);
        $data = count((array) session('cart'));

        $cart = (array) session('cart');
        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!', 'data' => $data, 'cart' => $cart]);
    }
}
