<?php
$userid=$_GET['id'];
?>

@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Profile
@endsection

@section('main-content')

@section('active-menu')
    Profile
@endsection

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Profile of id=<?= $userid?>
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John"
                            style="border: 2px solid rgb(193, 191, 191); border-radius: 5px; padding: 8px 15px;">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">First and last name</span>
                        <input type="text" aria-label="First name" class="form-control">
                        <input type="text" aria-label="Last name" class="form-control">
                      </div>

                    <button type="button" class="btn btn-warning">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
@endpush
