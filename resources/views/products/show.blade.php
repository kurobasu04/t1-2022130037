@extends('layouts.template')

@section('title', 'Product Details')

@section('body')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Product Details</h2>
                        <hr>
                        @if ($product->product_image)
                            <img src="{{ $product->avatar_url }}" class="rounded img-thumbnail mx-auto d-block my-3" />
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">Product Name</th>
                                <td>{{ $product->product_name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Retail Price</th>
                                <td>{{ 'Rp ' . number_format($product->retail_price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Wholesale Price</th>
                                <td>{{ 'Rp ' . number_format($product->wholesale_price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Origin</th>
                                <td>{{ $product->origin }} - {{ $countryName }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Quantity</th>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Created At</th>
                                <td>{{ $product->created_at ? $product->created_at->format('d-m-Y H:i:s') : '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Updated At</th>
                                <td>{{ $product->updated_at ? $product->updated_at->format('d-m-Y H:i:s') : '-' }}</td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-start mt-4 mb-5">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
