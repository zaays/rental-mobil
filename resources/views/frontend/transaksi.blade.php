@extends('frontend.layout.app')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container ">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Transaksi Mobil</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">Pembayaran Sewa: {{ $mobil->merk }}</h5>
                                </div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Nama Mobil</span>
                                        <span style="font-weight: 600">{{ $mobil->merk }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>No. Polisi</span>
                                        <span style="font-weight: 600">{{ $mobil->no_polisi }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Harga Sewa/Hari</span>
                                        <span style="font-weight: 600">{{ $mobil->formattedPrice }}</span>
                                    </li>
                                </ul>
                                <form action="{{ route('transaksi.store', $mobil->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                            name="tanggal_mulai" required>
                                        @error('tanggal_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                            name="tanggal_akhir" required>
                                    </div>
                                    @error('tanggal_akhir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mb-2">Pesan Mobil</button>
                                </form>

                            </div>
                        </div>
                        <!-- Product actions-->

                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('storage/' . $mobil->gambar) }}" alt="..." />

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
