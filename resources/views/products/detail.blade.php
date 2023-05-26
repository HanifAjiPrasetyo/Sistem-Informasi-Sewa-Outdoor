@extends('layouts.main')

@section('title')
    Detail Products
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?outdoors'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">DETAIL PRODUCT</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container-fluid">
        <a href="/products" class="col-lg-2 fw-bold text-dark ms-3">
            <i class="fa-solid fa-arrow-left"></i> Back to products
        </a><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-11 text-center align-items-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded"
                    width="400" style="max-height: 400px">
                <div class="h5 mt-2">{{ $product->name }}</div>
                <div class="small mt-2 fw-bold">
                    Price : IDR {{ $product->price }} / day | Stock : {{ $product->stock }}
                </div>
                <center>
                    <div class="mt-4 fw-bold text-dark mx-5 bg-gradient-faded-light rounded" style="text-align:justify">
                        <div class="p-4">
                            {!! $product->description !!}
                        </div>
                    </div>
                </center>
                @if (auth()->user()->username !== 'admin')
                    <div class="mt-4 me-4 text-dark fw-bold">
                        <button class="btn btn-success" onclick="return confirm('Add to cart?')">Add to Cart</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
