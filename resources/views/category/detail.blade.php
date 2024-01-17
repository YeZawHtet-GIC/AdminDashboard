@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1 p-5 bg-dark rounded">
                <div class="card px-5 bg-black">
                    <div class="card-header text-center text-warning h3 my-3">Category Detail</div>
                    <div class="card-body">
                        <h3 class="text-center text-warning">{{ $category->name }}</h3>
                    </div>
                    <div class="card-footer text-center"><a href="{{ route('category.index') }}"
                            class="px-5 btn btn-outline-warning my-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
