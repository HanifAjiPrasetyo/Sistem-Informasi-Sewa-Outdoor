@extends('layouts.main')

@section('title')
    User | Rent
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?payments'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">CHECKOUT</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container">
        {{-- @if (session()->has('success'))
            <div class="alert alert-info alert-dismissible fade show w-25 ms-auto me-auto text-light" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-thumbs-up mx-2"></i></span>
                <span class="alert-text">{{ session('success') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show w-25 ms-auto me-auto text-light" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-triangle-exclamation mx-2"></i></span>
                <span class="alert-text text-light">{{ session('error') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                </button>
            </div>
        @endif --}}



    </div>
@endsection
