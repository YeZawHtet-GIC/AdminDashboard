@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">

                <div class="card">
                    <div class="card-header text-center bg-primary h3">Item Detail</div>
                    <div class="card-body bg-secondary">
                        <div class="row">
                            <div class="col-4"><h3>Name :</h3>
                                <h3>Price :</h3>
                                <h3>Category Name :</h3>
                                <h3>Expire Date :</h3></div>
                            <div class="col-8"><h3>{{ $item->name }}</h3>
                                <h3>{{ $item->price }}</h3>
                                <h3>{{ $item->category->name }}</h3>
                                <h3>{{ $item->expire_date }}</h3></div>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-secondary"><a href="{{ route('category.index') }}" class="px-5 btn btn-outline-warning mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
