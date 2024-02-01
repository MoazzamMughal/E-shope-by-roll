<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::all();

        return view('admin.pages.products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.add-products', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_detail' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Validation for category selection
        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        }
        // dd($request->all());
        Product::create([
            'product_image' => $imagePath,
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_detail' => $request->input('product_detail'),
            'category_id' => $request->input('category_id'), // Assign the selected category
        ]);
    
        return redirect()->route('add.product')->with('success', 'Product added successfully!');
    }
    


    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.pages.edit-product', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_detail' => 'required|string',
        ]);

        $product = Product::findOrFail($id);

        // Update product details
        $product->update([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_detail' => $request->input('product_detail'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }


}
