@extends('layouts.main')

@section('title')
    User | Rent
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">YOUR RENTS</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    use Carbon\Carbon;
@endphp

@section('container')
    <div class="container">
        <div class="col-lg-6 mb-3">
            <div class="h5">Total : {{ $rents->count() }} Rent</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="table-success">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        #
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Rent Id
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Duration
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Start At</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        End At
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bolder text-dark">{{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $rent->rent_id }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold text-lowercase">{{ $rent->duration }}
                                                day(s)
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ Carbon::parse($rent->rent_start)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ Carbon::parse($rent->rent_end)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $rent->status }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-sm btn-success text-capitalize text-xxs my-auto"
                                                href="/user/rent/detail?id={{ $rent->id }}">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
