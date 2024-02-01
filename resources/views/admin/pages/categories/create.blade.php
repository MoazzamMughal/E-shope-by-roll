@extends('admin.index')

@section('add-categories')
    <div class="main-panel">
        <div class="content-wrapper">

            {{-- Create Cateory Sectiion --}}

            <div class="container ">
                <a href="product" type="submit" class="btn btn-outline-success ">Back</a>
                <h1 class="text-center ">Create Category</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="text-center mt-5" action="{{ route('store.category') }}" method="post">
                    @csrf

                    <label for="name">
                        <h3>Category Name:</h3>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

                    <button type="submit" class="btn btn-outline-success">Create Category</button>
                </form>

                {{-- All Category show Section  --}}

                <div class="container mt-5">
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
                                            class="btn btn-outline-success ">Edit</a>

                                        <a href="{{ route('categories.destroy', $category->id) }}"class="btn btn-outline-danger "
                                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @include('admin.component.footer')
    </div>
@endsection
