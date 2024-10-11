@extends('layouts.template')

@section('title', 'Retail List')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">RETAIL STORE PRODUCTS</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded table-responsive">
                    <div class="card-body">
                        <!-- Wrapper -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Search -->
                            <input type="text" id="search" class="form-control me-2" placeholder="Search by Product Name"
                                style="width: 30%;">
                            <!-- Add Product -->
                            <a href="{{ route('products.create') }}" class="btn btn-md btn-success">ADD PRODUCT</a>
                        </div>

                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"><b>ID</b></th>
                                    <th scope="col"><b>Products Name</b></th>
                                    <th scope="col"><b>Description</b></th>
                                    <th scope="col" style="width: 10%"><b>Retail Price</b></th>
                                    <th scope="col"><b>Wholesale Price</b></th>
                                    <th scope="col"><b>Origin</b></th>
                                    <th scope="col"><b>Quantity</b></th>
                                    <th scope="col"><b>Created At</b></th>
                                    <th scope="col"><b>Updated At</b></th>
                                    <th scope="col"><b>ACTIONS</b></th>
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
                                        <td>{{ optional($product->created_at)->format('d-m-Y H:i:s') ?? '' }}</td>
                                        <td>{{ optional($product->updated_at)->format('d-m-Y H:i:s') ?? '' }}</td>
                                        <td class="text-center d-flex justify-content-center gap-2">
                                            <!-- Show/Detail -->
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-sm btn-info">SHOW</a>
                                            <!-- Edit -->
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-warning">EDIT</a>
                                            <!-- Delete -->
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">DELETE</button>
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

                        <!-- no found message -->
                        <div id="no-results" class="alert alert-warning text-center d-none">No products found with that
                            name.</div>

                        <div class="d-flex justify-content-center mt-4" id="pagination-links">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery search --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                var found = false;

                $('#product-list tr').filter(function() {
                    var productName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var isVisible = productName.indexOf(value) > -1;
                    $(this).toggle(isVisible);
                    if (isVisible) {
                        found = true;
                    }
                });

                if (found) {
                    $('#no-results').addClass('d-none'); // hide message
                } else {
                    $('#no-results').removeClass('d-none'); // show message
                }
            });
        });
    </script>

@endsection
