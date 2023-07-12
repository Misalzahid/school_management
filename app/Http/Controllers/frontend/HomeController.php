<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Varient;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('frontend.checkout');
    }

    public function index()
    {
        $categories = Category::where('title', 'men')->first();
        $category = Category::where('title', 'women')->first();
        $kidscategory = Category::where('title', 'kids')->first();
        $products = Product::with('varients')->get();
        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $variant) {
                $price = $variant->price;
            }
        }
        return view('frontend.index', compact('products', 'price', 'categories', 'category', 'kidscategory'));
    }

    public function men()
    {
        $categories = Category::where('title', 'men')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'men');
        })->with('varients')->get();

        $prices = [];

        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }

        return view('frontend.men', compact('products', 'price', 'subcategories'));
    }

    public function order()
    {

        return view('frontend.order-complete');
    }

    public function productDetail()
    {

        return view('frontend.product-detail');
    }

    public function women()
    {
        $categories = Category::where('title', 'women')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'women');
        })->with('varients')->get();

        $prices = [];

        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }
        return view('frontend.women', compact('products', 'price', 'subcategories'));
    }

    public function kids()
    {
        $categories = Category::where('title', 'kids')->with('subCategory')->first();
        $subcategories = $categories->subCategory;
        $products = Product::whereHas('category', function ($query) {
            $query->where('title', 'kids');
        })->with('varients')->get();

        $prices = [];

        foreach ($products as $product) {
            $varients = $product->varients;
            foreach ($varients as $varient) {
                $price[$product->id] = $varient->price;
            }
        }
        return view('frontend.women', compact('products', 'price', 'subcategories'));
    }

    public function showProduct(Request $request, $id)
{
    $peoducts = SubCategory::with('product')->find($id);
    // return $peoducts->product->image;

    return view('frontend.product', compact('peoducts'));
}
}
