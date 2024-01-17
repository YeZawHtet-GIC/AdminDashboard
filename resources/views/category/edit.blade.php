@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1 p-5 bg-dark rounded">
                <div class="card bg-black">
                    <div class="card-header text-center h3 text-warning mt-3">Category Update Page</div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category) }}" method="post">
                            @csrf
                            @method('put')
                            <label for="name" class="form-label text-warning">Category Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                placeholder="Enter Category Name"
                                class="form-control @error('name')
                            is-invalid
                        @enderror">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-outline-warning my-3">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
