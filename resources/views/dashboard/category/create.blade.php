@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-header text-center">Category Insert Page</div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <label for="name" class="form-label">Category Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter Category Name"
                                class="form-control @error('name')
                            is-invalid
                        @enderror">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <a href="{{ route('category.index') }}" class="btn btn-outline-dark mt-3">Back</a>
                            <button class="btn btn-outline-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
