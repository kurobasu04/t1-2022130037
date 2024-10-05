@extends('layouts.template')

@section('title', 'Dashboard')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">RETAIL STORE DASHBOARD</h3>
                    <hr>
                </div>
                <div class="row mb-4">
                    <!-- Dashboard Cards -->
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Quantity</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_quantity }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Most Expensive Product</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $most_expensive_product->product_name }}</h5><br>
                                <p>Price: {{ $most_expensive_product->retail_price }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Most Stocked Product</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $most_stocked_product->product_name }}</h5><br>
                                <p>Quantity: {{ $most_stocked_product->quantity }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Produk -->
                <br>
                <h4 class="text-center my-4">Product List</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Retail Price</th>
                                <th>Wholesale Price</th>
                                <th>Origin</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ 'Rp ' . number_format($product->retail_price, 0, ',', '.') }}</td>
                                    <td>{{ 'Rp ' . number_format($product->wholesale_price, 0, ',', '.') }}</td>
                                    <td>{{ $product->origin }}</td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
