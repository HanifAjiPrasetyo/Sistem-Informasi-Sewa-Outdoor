@extends('layouts.main')

@section('title')
    Products
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">PRODUCTS</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container shadow-lg rounded bg-gray-700">
        <div class="p-4">
            <div class="row">
                <div class="col-md-6 text-start mb-4 mt-2">
                    <h3 class="text-light fw-bold z-index-1 position-relative">
                        All Products
                    </h3>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-md-5 mb-4">
                        <div class="card card-profile">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-12 mt-n4">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="border-radius-md shadow-lg img-fluid"
<<<<<<< HEAD
                                                src="{{ asset('storage/' . $product->image) }}" alt="image" />
=======
                                                src="{{ asset('storage/'.$product->image) }}" alt="image"/>
>>>>>>> c498023812b22a4ad0f886d56f0071d412bd1c35
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-3">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                        <small class="text-info fw-bold">
                                            {{ $product->category->name }}
                                        </small>
                                        <small class="mb-0 d-block">
                                            IDR {{ $product->price }} / day
                                            <a href="/" class="fw-bold fs-5 mx-3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Detail Product">→
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
