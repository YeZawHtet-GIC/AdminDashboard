@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1 bg-dark px-3 pt-5 rounded">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card text-warning bg-black">
                    <div class="card-header text-center h3 text-warning">Item Insert Page</div>
                    <div class="card-body text-warning">
                        <form action="{{ route('item.store') }}" method="post">
                            @csrf
                            <label for="name" class="form-label">Item Name <small class="text-danger">*</small></label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Item Name"
                                class="form-control @error('name')
                            is-invalid
                        @enderror">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="name" class="form-label">Item Price <small class="text-danger">*</small></label>
                            <input type="number" name="price" value="{{ old('price') }}" placeholder="Enter Item Price"
                                class="form-control @error('price')
                            is-invalid
                        @enderror">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="CategoryName" class="form-label">Choose Category Name<small
                                    class="text-danger">*</small></label>
                            <br>
                            <select name="category"
                                class="form-control @error('category')
                                is-invalid
                            @enderror">
                                <option value="">Choose One.....</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == old('category')) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="Expire Date" class="form-label">Item Expire Date <small
                                    class="text-danger">*</small></label>
                            <input type="date" name="epdate" value="{{ old('epdate') }}"
                                placeholder="Choose Expire Date"
                                class="form-control @error('epdate')
                                    is-invalid
                                @enderror">
                            @error('epdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-outline-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
