<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// homepage
Route::get('/', [DashboardController::class, 'index'])->name('home');

// route products
Route::resource('/products', ProductController::class);

