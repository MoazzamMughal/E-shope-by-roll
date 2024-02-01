@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">



        <div class="container">
            <a href="{{route('home')}}" type="submit" class="btn btn-outline-success ">Back</a>

            @if (session()->has('success'))
                <div class="alert alert-dismissable alert-success">
                    {!! session()->get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h1 class="text-center">All Oders</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-light">id</th>
                        <th scope="col" class="text-light">Product</th>
                        <th scope="col" class="text-light">Price</th>
                        <th scope="col" class="text-light">Image</th>
                        <th scope="col" class="text-light">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($products as $product) --}}
                        <tr>
                            <td class="text-light">id</td>
                            <td class="text-light">product name</td>
                            <td class="text-light">product price</td>
                            <td class="text-light">
                                <img src=""
                                    alt="" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <a href="#"
                                    class="btn btn-outline-success">Edit</a>

                                <a href="#"
                                    class="btn btn-outline-danger ">Delete</a>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>

</div>
@include('admin.component.footer')
</div>

@endsection