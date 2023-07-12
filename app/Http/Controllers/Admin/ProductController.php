<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Varient;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'subCategory','varients')->orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sub_Category_id' => 'required',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/users/'), $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
        } else {
            $image = 'public/admin/assets/images/users/1675332882.jpg';
        }
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->sub_Category_id,
            'image' => $image,
        ]);
        $size = $request->size;
        $quantities = $request->quantity;
        $prices = $request->price;
        $totalStocks = $request->total_stock;

        for ($i = 0; $i < count($size); $i++) {
            $productVarient = new Varient();
            $productVarient->product_id = $product->id;
            $productVarient->size = $size[$i];
            $productVarient->quantity = $quantities[$i];
            $productVarient->price = $prices[$i];
            $productVarient->total_stock = $totalStocks[$i];
            $productVarient->save();
        }

        return redirect()->route('product.index')->with(['status' => true, 'message' => 'Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Product::with('category', 'subCategory', 'varients' )->find($request->id);
        $product = view('admin.product.model', compact('data'))->render();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('varients')->find($id);
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        // return $subCategories;
        return view('admin.product.edit', compact('product', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'size' => 'required|array',
            'size.*' => 'integer|min:0',
            'price' => 'required|array',
            'price.*' => 'numeric|min:0',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:0',
            'total_stock' => 'required|array',
            'total_stock.*' => 'integer|min:0',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $destination = 'public/admin/assets/img/users/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/admin/assets/images/users', $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
            $product->image = $image;
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->sub_category_id,
        ]);

        $sizes = $request->size;
        $quantities = $request->quantity;
        $prices = $request->price;
        $totalStocks = $request->total_stock;

        $product->varients()->delete();

        for ($i = 0; $i < count($sizes); $i++) {
            $productVarient = new Varient();
            $productVarient->product_id = $product->id;
            $productVarient->size = $sizes[$i];
            $productVarient->quantity = $quantities[$i];
            $productVarient->price = $prices[$i];
            $productVarient->total_stock = $totalStocks[$i];
            $productVarient->save();
        }
        return redirect()->route('product.index')->with(['status' => true, 'message' => 'Update Successfully']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with(['status' => true, 'message' => 'Delete Successfully']);
    }
    public function getSubCategories(Request $request, $id)
    {
        $data = SubCategory::where("category_id", $request->category_id)->get();
        return response()->json(['data' => $data]);
    }
}
