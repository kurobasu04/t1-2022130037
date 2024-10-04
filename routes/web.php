<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// homepage
Route::get('/', function () {
    return view('welcome');
});

// route products
Route::resource('/products', ProductController::class);
