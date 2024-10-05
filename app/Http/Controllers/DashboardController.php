<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {

        $total_quantity = Product::sum('quantity');

        $most_expensive_product = Product::orderBy('retail_price', 'desc')->first();

        $most_stocked_product = Product::orderBy('quantity', 'desc')->first();

        $products = Product::all();

        return view('home', compact('total_quantity', 'most_expensive_product', 'most_stocked_product', 'products'));
    }
}
