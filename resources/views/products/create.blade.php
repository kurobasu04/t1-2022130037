@extends('layouts.template')

@section('title', 'Retail Data Input')

@section('body')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{-- <h3 class="text-center my-4">RETAIL STORE</h3> --}}
                    <hr>
                </div>
                <div class="mt-4 p-5 bg-dark text-white rounded text-center">
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
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="e.g. Ikan Cupang" required value="{{ old('product_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="e.g. Ikan Cupang impor dari Swedia"
                                        required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="retail_price" class="form-label">Retail Price</label>
                                    <input type="number" class="form-control" id="retail_price" name="retail_price"
                                        placeholder="e.g. 1000000" value="{{ old('retail_price') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="wholesale_price" class="form-label">Wholesale Price</label>
                                    <input type="number" class="form-control" id="wholesale_price" name="wholesale_price"
                                        placeholder="e.g. 1000000" value="{{ old('wholesale_price') }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="origin" class="form-label">Origin</label>
                                    <select class="form-control" id="origin" name="origin" required>
                                        <option value="" disabled selected>Select Country</option>
                                        <option value="ID" {{ old('origin') == 'ID' ? 'selected' : '' }}>Indonesia
                                        </option>
                                        <option value="CN" {{ old('origin') == 'CN' ? 'selected' : '' }}>China</option>
                                        <option value="US" {{ old('origin') == 'US' ? 'selected' : '' }}>United States
                                        </option>
                                        <option value="GB" {{ old('origin') == 'GB' ? 'selected' : '' }}>United Kingdom
                                        </option>
                                        <option value="JP" {{ old('origin') == 'JP' ? 'selected' : '' }}>Japan</option>
                                        <option value="FR" {{ old('origin') == 'FR' ? 'selected' : '' }}>France
                                        </option>
                                        <option value="DE" {{ old('origin') == 'DE' ? 'selected' : '' }}>Germany
                                        </option>
                                        <option value="IN" {{ old('origin') == 'IN' ? 'selected' : '' }}>India</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="e.g. 200" value="{{ old('quantity') }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="product_image" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="product_image" name="product_image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
