@extends('layouts.template')

@section('title', 'Retail Data Input')

@section('body')

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Retail Data Input</h1>
    </div>

    <div class="row my-5">
        <div class="col-12 px-5">

            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="id" class="form-label">ID Product</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="ID Product" required value="{{ old('id') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="name" placeholder="Product Name" required value="{{ old('name') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" required value="{{ old('description') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="retail_price" class="form-label">Retail Price</label>
                    <input type="retail_price" class="form-control" id="retail_price" name="retail_price" placeholder="Retail Price" value="{{ old('retail_price') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="wholesale_price" class="form-label">Wholesale Price</label>
                    <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" placeholder="Wholesale Price" value="{{ old('wholesale_price') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="origin" class="form-label">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" placeholder="Origin" value="{{ old('origin') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
                </div>

                {{-- Input Image --}}
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="product_image">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                </div>



                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>

@endsection
