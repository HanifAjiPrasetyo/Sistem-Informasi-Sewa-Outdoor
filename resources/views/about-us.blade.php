@extends('layouts.main')

@section('title')
    About Us
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">ABOUT US</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container shadow-lg rounded bg-gray-700">
        <div class="p-3">
            <div class="row">
                <div class="col-md-6 text-start mb-4 mt-2">
                    <h3 class="text-light fw-bold z-index-1 position-relative">
                        Header
                    </h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="h4 text-light fw-bold">ISI ABOUT US</div>
                </div>
            </div>
        </div>
    </div>
@endsection
