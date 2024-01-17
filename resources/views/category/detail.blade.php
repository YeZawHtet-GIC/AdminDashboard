@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">

                <div class="card">
                    <div class="card-header text-center bg-primary h3">Category Detail</div>
                    <div class="card-body bg-secondary">
                        <h3 class="text-center">{{ $category->name }}</h3>
                    </div>
                    <div class="card-footer text-center bg-secondary"><a href="{{ route('category.index') }}"
                            class="px-5 btn btn-outline-warning mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
