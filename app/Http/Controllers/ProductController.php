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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|string|max:2',
            'quantity' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $model = new Product();
        $model->product_name = $request->product_name;
        $model->description = $request->description;
        $model->retail_price = $request->retail_price;
        $model->wholesale_price = $request->wholesale_price;
        $model->origin = $request->origin;
        $model->quantity = $request->quantity;

        if ($request->hasFile('product_image')) {
            $model->product_image = $request->file('product_image')->store('images', 'public');
        }

        $model->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $countries = [
            'ID' => 'Indonesia',
            'US' => 'United States',
            'CN' => 'China',
            'JP' => 'Japan',
            'DE' => 'Germany',
            'GB' => 'United Kingdom of Great Britain and Northern Ireland',
            'FR' => 'France',
            'IN' => 'India',

        ];

        $countryName = isset($countries[$product->origin]) ? $countries[$product->origin] : 'Unknown';

        return view('products.show', compact('product', 'countryName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
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
        $product->updated_at = now();
        $product->save();

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
