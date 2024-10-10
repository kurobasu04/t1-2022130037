@extends('layouts.template')

@section('title', 'Retail List')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">RETAIL STORE</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded table-responsive">
                    <div class="card-body">
                        <!-- Wrapper untuk tombol dan search bar -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Tombol Add Product -->
                            <a href="{{ route('products.create') }}" class="btn btn-md btn-success">ADD PRODUCT</a>
                        </div>

                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">RETAIL PRICE</th>
                                    <th scope="col">WHOLESALE PRICE</th>
                                    <th scope="col">ORIGIN</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">CREATED AT</th>
                                    <th scope="col">UPDATED AT</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ 'Rp ' . number_format($product->retail_price, 0, ',', '.') }}</td>
                                        <td>{{ 'Rp ' . number_format($product->wholesale_price, 0, ',', '.') }}</td>
                                        <td>{{ $product->origin }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td class="text-center">
                                            <!-- Tombol Show/Detail -->
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-sm btn-info">SHOW</a>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-secondary ms-2">EDIT</a>
                                            <!-- Tombol Delete -->
                                            <form action={{ route('products.destroy', $product) }} method="POST"
                                                class="d-inline-block ms-2">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Data Produk Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center" id="pagination-links">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection
