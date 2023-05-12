@extends('layouts.main')

@section('header')
    <div class="page-header min-vh-50" style="background-image: url('../assets/img/bg9.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mx-auto my-auto">
                    <h2 class="text-white">PRODUCTS</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container bg-gradient-dark rounded-3">
        <div class="p-4">
            <div class="row">
                <div class="col-md-8 text-start mb-4">
                    <h3 class="text-white z-index-1 position-relative">
                        All Products
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-8">
                    <div class="card card-profile mt-3">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="border-radius-md shadow-lg"
                                            src="https://source.unsplash.com/300x300?camp" alt="image" width="100" />
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-3">
                                    <h6 class="mb-0">Camping Tent</h6>
                                    <small class="text-info fw-bold">
                                        Tent
                                    </small>
                                    <small class="mb-0 d-block">
                                        IDR100.000,00/day
                                        <a href="/" class="fw-bold fs-5 mx-3" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Read More">→</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
