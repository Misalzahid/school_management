<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Varient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public function getproductDetail($id){
        //get product detail
        $productDetails = Product::with('varients')->find($id);
        // return $productDetails;
        return view('frontend.product-detail',compact('productDetails'));
    }

    //get varient id against request size
    public function getVarient(Request $request){

        $variants = Varient::where('id',$request->size)->first();
        return response()->json(['data' => $variants]);

    }
}
