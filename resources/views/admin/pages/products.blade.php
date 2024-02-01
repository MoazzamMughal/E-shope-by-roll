@extends('admin.index')
@section('product-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <a href="{{ route('add.product') }}" class="btn btn-outline-success ">Create Product</a>

                @if (session()->has('success'))
                    <div class="alert alert-dismissable alert-success">
                        {!! session()->get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h1 class="text-center">Show Products</h1>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-light">Product Name</th>
                            <th scope="col" class="text-light">Product Detail</th>
                            <th scope="col" class="text-light">Price</th>
                            <th scope="col" class="text-light">Image</th>
                            <th scope="col" class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-light">{{ $product->product_name }}</td>
                                <td class="text-light">{{ $product->product_detail }}</td>
                                <td class="text-light">${{ $product->product_price }}</td>
                                <td class="text-light">
                                    <img src="{{ asset('storage/' . $product->product_image) }}"
                                        alt="{{ $product->product_name }}" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-outline-success">Edit</a>

                                    <a href="{{ route('products.destroy', $product->id) }}"
                                        class="btn btn-outline-danger ">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
@include('admin.component.footer')
    </div>
@endsection
