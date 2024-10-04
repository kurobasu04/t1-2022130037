<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|size:12|unique:products,id',
            'product_name' => 'required|max:255',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
            ]);

            $imagePage = $request->file('product_image')->store('public/images');

            $validated['product_image'] = $imagePage;
        }

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'id' => 'required|size:12|unique:products,id',
            'product_name' => 'required|max:255',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
            ]);

            $imagePage = $request->file('product_image')->store('public/images');

            $validated['product_image'] = $imagePage;
        }

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
