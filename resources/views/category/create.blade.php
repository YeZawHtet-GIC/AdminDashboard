@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1 p-5 bg-dark rounded">
                <div class="card bg-dark">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-header text-center h3 text-warning">Category Insert Page</div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <label for="name" class="form-label text-warning">Category Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter Category Name"
                                class="form-control @error('name')
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
