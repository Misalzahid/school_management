<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Product;
use App\Models\UpcomingProduct;
use App\Models\Varient;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{
    public function about()
    {
        $product = Product::all();
        return view('frontend.about', compact('product'));
    }

    public function addToWishlist()
    {
        $products = Product::with('varients')->get();
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $variant) {
                $price = $variant->price;
            }
        }
        return view('frontend.add-to-wishlist');
    }

    public function cart()
    {
        $products = Product::with('varients')->get();
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $variant) {
                $price = $variant->price;
            }
        }
        return view('frontend.cart', compact('products', 'price'));
    }

    public function contact()
    {

        return view('frontend.contact');
    }

    public function checkout()
    {
        $total = 0;
        foreach((array) session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }
        // return $total;
        return view('frontend.checkout',compact('total'));
    }

    public function index()
    {
        $categories = Category::where('title', 'men')->first();
        $category = Category::where('title', 'women')->first();
        $kidscategory = Category::where('title', 'kids')->first();
        $products = Product::with('varients')->paginate(8);
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $variant) {
                $price = $variant->price;
            }
        }
        // $products = Varient::with('product')->paginate(8);
        // return $products;
        return view('frontend.index', compact('products', 'price', 'categories', 'category', 'kidscategory'));
    }

    public function getallProduct()
    {
        $products = Product::with('varients')->paginate(8);
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $variant) {
                $price = $variant->price;
            }
        }

        return view('frontend.allProduct', compact('products', 'price'));
    }

    public function men()
    {
        //get sub category agaainst category
        $categories = Category::where('title', 'men')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        //get all product against category
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'men');
        })->with('varients')->paginate(8);

        $prices = [];
        //get all varients
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }

        return view('frontend.men', compact('products', 'price', 'categories', 'subcategories'));
    }

    public function order()
    {
        $order = Order::latest()->with('orderItem','orderAddress')->first();
        $name = $order->orderAddress->f_name;
        return view('frontend.order-complete',compact('name','order'));
    }

    // public function productDetail()
    // {
    //     return view('frontend.product-detail');
    // }

    public function women()
    {
        //get sub category agaainst category
        $categories = Category::where('title', 'women')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        //get all product against category
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'women');
        })->with('varients')->paginate(8);

        $prices = [];
        //get all varients
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }
        return view('frontend.women', compact('products', 'price', 'categories', 'subcategories'));
    }

    public function kids()
    {
        //get sub category agaainst category
        $categories = Category::where('title', 'kids')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        //get all product against category
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'kids');
        })->with('varients')->paginate(8);

        $prices = [];
        //get all varients
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }
        return view('frontend.kids', compact('products', 'price', 'categories', 'subcategories'));
    }

    //get all product against subCategory
    public function showProduct(Request $request, $id)
    {
        $products = SubCategory::with('product')->find($id)->product()->paginate(8);
        return view('frontend.product', compact('products'));
    }

    public function upComingProduct(){

        $products = UpcomingProduct::paginate(8);
        return view('frontend.upcomingPproduct.upcoming',compact('products'));
    }
}
