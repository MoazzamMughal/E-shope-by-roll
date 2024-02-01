@extends('admin.index')
@section('all-categories')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container ">
                <a href="{{ route('add.category') }}" class="btn btn-outline-success">Create Category</a>
                @if (session()->has('success'))
                    <div class="alert alert-dismissable alert-success">
                        {!! session()->get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h1 class="text-center mt-2">All Categories</h1>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-light">ID</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-light">{{ $category->id }}</td>
                                <td class="text-light">{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-outline-success text-light">Edit</a>

                                    <a href="{{ route('categories.destroy', $category->id) }}"class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.component.footer')
    </div>
@endsection
