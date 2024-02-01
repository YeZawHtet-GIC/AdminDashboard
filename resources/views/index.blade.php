@extends('layouts.app')
@include('dashboard.header')
@section('content')
    <div class="container">
        <h2 class="text-center mb-5">GIC Shopping</h2>
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-12">
                <div class="row row-cols-1 row-cols-lg-2">
                    @foreach ($data as $item)
                        <div class="col" style="width: 20rem;">
                            <div class="card">
                                <img src="{{ asset('storage/gallery/' . $item->image) }}" class="card-img-top img-fluid"
                                    style="height: 200px;" alt="...">
                                <div class="mt-3 p-3 d-flex justify-content-between align-content-center">
                                    <div class="item-info d-flex flex-column">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <h5 class="card-title">{{ number_format($item->price, 2) }}</h5>
                                    </div>
                                    <div class="button">
                                        <button class="btn btn-outline-success p-2 add-to-cart"
                                            data-item='{{ json_encode($data) }}'>
                                            <i class="fas fa-cart-plus fs-4" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-5 col-sm-12 ">
                <div class="col">
                    <div class="cart-container py-4 px-5  border bg-gradient-dark rounded shadow text-warning">
                        <div class="row mt-3 mb-3">
                            <div class="col fw-bolder">#</div>
                            <div class="col fw-bolder">Item Name</div>
                            <div class="col fw-bolder">Price</div>
                        </div>
                        <div class="row mb-3" id="card-items">
                            {{-- add to card items --}}
                            <div class="col">1</div>
                            <div class="col">Item 1</div>
                            <div class="col">1000</div>
                        </div>

                        <hr class="fs-3">
                        <div class="row">
                            <div class="col fw-bolder"></div>
                            <div class="col fw-bolder">Total</div>
                            <div class="col fw-bolder" id="total-price">2000</div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
