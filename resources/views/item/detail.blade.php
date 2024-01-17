@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1 px-5 py-3 bg-dark rounded">

                <div class="card bg-dark shadow">
                    <div class="card-header text-center h3 text-warning">Item Detail</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 text-warning"><h3>Name :</h3>
                                <h3>Price :</h3>
                                <h3>Category Name :</h3>
                                <h3>Expire Date :</h3></div>
                            <div class="col-7 text-warning"><h3>{{ $item->name }}</h3>
                                <h3>{{ $item->price }}</h3>
                                <h3>{{ $item->category->name }}</h3>
                                <h3>{{ $item->expire_date }}</h3></div>
                        </div>
                    </div>
                    <div class="card-footer text-center"><a href="{{ route('item.index') }}" class="px-5 btn btn-outline-warning mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
