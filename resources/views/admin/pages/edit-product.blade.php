@extends('admin.index')
@section('edit-product-content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="container ">
                <a href="/product" type="submit" class="btn btn-outline-success ">Back</a>
                <h1 class="text-center mt-2">Edit Product</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name"
                            value="{{ $product->product_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price"
                            value="{{ $product->product_price }}" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="product_detail">Product Detail</label>
                        <textarea class="form-control" id="product_detail" name="product_detail" required>{{ $product->product_detail }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}"
                            style="max-width: 300px; max-height: 300px;">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Update Product</button>
                </form>
            </div>
        </div>
        @include('admin.component.footer')
    </div>
@endsection
