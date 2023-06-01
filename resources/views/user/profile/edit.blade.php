@extends('layouts.main')

@section('title')
    User | Profile
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x600?camp'); height:42vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">EDIT PROFILE</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6 my-4 text-center bg-gradient-dark rounded">
                <form action="/user/profile/{{ $user->id }}" method="post" enctype="multipart/form-data"
                    class="p-4">
                    @method('put')
                    @csrf
                    <div class="input-group input-group-static is-valid mb-4">
                        <label for="photo" class="text-muted fw-bold">Photo</label>
                        <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}"
                                class="img-preview img-fluid rounded-circle m-auto col-sm-4">
                        @else
                            <img src="{{ asset('storage/user-photos/no-photo.png') }}"
                                class="img-preview img-fluid rounded-circle m-auto col-sm-4">
                        @endif
                        <input type="file" class="form-control @error('photo') is-invalid @enderror text-light"
                            id="photo" name="photo" onchange="previewPhoto()">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static is-valid mb-4">
                        <label for="name" class="text-muted fw-bold">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror text-light"
                            id="name" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static is-valid mb-4">
                        <label for="username" class="text-muted fw-bold">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror text-light"
                            id="username" name="username" value="{{ old('username', $user->username) }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static is-valid mb-4">
                        <label for="email" class="text-muted fw-bold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror text-light"
                            id="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-static is-valid mb-4">
                        <label for="province" class="text-muted fw-bold">Address</label>
                        <input type="hidden" name="address">
                        <select name="province" id="province" class="form-control mb-1 border-0 text-light" required>
                            <option selected disabled>--Pilih Provinsi--</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" class="text-dark">
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        <select name="regency" id="regency" class="form-control mb-1 text-light" required>
                        </select>
                        <select name="district" id="district" class="form-control mb-1 text-light" required>
                        </select>
                        <select name="village" id="village" class="form-control mb-1 text-light" required>
                        </select>
                        <textarea name="detailAddress" class="form-control text-light" placeholder="Detail (Jalan, RT / RW) ..." required></textarea>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-pen-nib mx-1"></i>
                            Update
                        </button>
                    </center>
                </form>
            </div>

        </div>
    </div>
    <script>
        function previewPhoto() {
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
