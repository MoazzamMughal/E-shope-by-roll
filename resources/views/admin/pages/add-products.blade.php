@extends('admin.index')
@section('add-product-content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="container ">
                <a href="product" type="submit" class="btn btn-outline-success ">Back</a>

                <h1 class="text-center ">Add Product</h1>

                @if (session()->has('success'))
                    <div class="alert alert-dismissable alert-success">
                        {!! session()->get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name:</label>
                        <input type="text" id="product_name" name="product_name" class="form-control text-light"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price:</label>
                        <input type="number" id="product_price" name="product_price" step="0.01"
                            class="form-control text-light" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_detail" class="form-label">Product Detail:</label>
                        <textarea id="product_detail" name="product_detail" class="form-control text-light" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select id="category_id" name="category_id" class="form-control text-light" required>
                            <!-- Populate the options with categories from your controller -->
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image:</label>
                        <input type="file" id="product_image" name="product_image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-outline-success">Add Product</button>
                </form>

            </div>

        </div>
    </div>
    @include('admin.component.footer')
    </div>
@endsection
