@extends('dashboard.index')
@section('create-category')
    <div class="container">
        <div class="row justify-content-center">
            @hasSection('success')
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Category Insert Page</div>
                    <div class="card-body">
                       <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Category Name <small class="text-danger">*</small></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Category Name" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
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
