@extends('frontend.layout.app')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Sewa Mobil</h1>
                <p class="lead fw-normal text-white-50 mb-2">
                    hanya dengan satu sentuhan
                </p>
                @auth('customer')
                    <a href="/login" class="btn btn-success text-light btn-md">Dashboard</a>
                @endauth

                @guest('customer')
                    <a href="/login" class="btn btn-success text-light btn-md">Login</a>
                    <a href="/register" class="btn btn-warning btn-md">Register</a>
                @endguest
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-5">Daftar Mobil</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($mobil as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            {{-- <div class="badge badge-custom bg-warning text-white position-absolute"
                        style="top: 0; right: 0">
                        Tidak Tersedia
                    </div> --}}
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $item->gambar) }}"
                                style="max-height: 200px; overflow:hidden; object-fit:contain" alt="..." />
                            <!-- Product details-->
                            <div class="card-body card-body-custom pt-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->merk }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">{{ $item->formattedPrice }}/</span>day
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Nomor Polisi</span>
                                            <span style="font-weight: 600">{{ $item->no_polisi }}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">

                                    <a class="btn btn-info mt-auto text-white"
                                        href="/detail/{{ $item->no_polisi }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
