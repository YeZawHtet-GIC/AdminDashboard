@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-center">Category Detail</div>
                    <div class="card-body">
                        <h3 class="text-center">{{ $category->name }}</h3>
                    </div>
                    <div class="card-footer text-center"><a href="{{ route('category.index') }}" class="px-5 btn btn-outline-dark mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
