<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //retrieve categories for the products form
     public function getCategory()
     {
        $categories = DB::table('category_subcategory_view')->get();
         return view('vendors.addproducts', compact('categories'),);
     }
     public function dashboard()
    {
        $products = Products::all();
        return view('dashboard', compact('products'));
    }
     
    public function index()
    {
        $products = Products::all();
        return view("vendors.products", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }
    public function getProductsTable()
    {
        $products = Products::paginate(3);
        Paginator::useBootstrap();
        return view('vendors.products', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // Store the uploaded file
        $path = $request->file('image')->store('public/images/products');
        $imgpath = $request->file('image')->store('/images/products');
        // Get the stored file's public URL
        $url = asset('storage/' . $imgpath);
        // the final images are stored in the storage/app/public/images directory
       
        $data = [
            'product_name' => $request->input('product_name'),
            'description' => $request->input('product_description'),
            'price' => $request->input('price'),
            'subcategory_id' => $request->input('subcategory'),
            'vendor_id'=>'1',
            'image' => $url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('products')->insert($data);
        return back()->with('success', 'Image uploaded successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($products)
    {
        $product = Products::findOrFail($products);
        $product->delete();
        return redirect()->route('products.list')->with('success', 'Product deleted successfully.');
    }
}
