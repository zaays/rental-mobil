@extends('frontend.layout.app')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Registrasi User</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="text-center">Form Registrasi Akun</h2>
                    <form action="{{ route('customer.register') }}" method="POST">
                        <!-- Tambahkan CSRF Token jika menggunakan framework seperti Laravel -->
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror "
                                id="name" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required
                                value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                name="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id=""
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih jenis
                                    kelamin
                                </option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukkan Kata Sandi" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="confirm_password" name="password_confirmation" placeholder="Ulangi Kata Sandi" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="phone"
                                name="no_hp" placeholder="Masukkan Nomor Telepon" required value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="address" name="alamat" rows="3"
                                placeholder="Masukkan Alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        <p class="text-center mt-3">Sudah punya akun? <a href="/login">Login di sini</a></p>
                </div>

            </div>
        </div>
    </section>
@endsection
