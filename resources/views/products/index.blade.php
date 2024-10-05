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
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
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
                            <tbody>
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
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-secondary">EDIT</a>
                                            <form action={{ route('products.destroy', $product) }} method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Produk Kosong
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

@endsection
