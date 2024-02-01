@extends('admin.index')

@section('edit-categories')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="container">
                <a href="/product" type="submit" class="btn btn-success">Back</a>

                <h1 class="text-center ">Edit Category</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                            class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update Category</button>
                </form>
            </div>

            </form>
        </div>
    </div>
    @include('admin.component.footer')
    </div>
@endsection
