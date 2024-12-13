@extends('backend.layouts.backend')

@section('content')
    <!-- Content Row -->
    <div class="container-fluid col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Mobil</h6>
            </div>

            <form action="{{ route('datamobil.update', $mobil->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror"
                                value="{{ $mobil->merk }}" autofocus required>
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_polisi"
                                class="form-control @error('no_polisi') is-invalid @enderror"
                                value="{{ $mobil->no_polisi }}" autofocus required>
                            @error('no_polisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Satuan/hari</label>
                        <div class="col-sm-10">
                            <input type="number" name="harga_satuan"
                                class="form-control @error('harga_satuan') is-invalid @enderror"
                                value="{{ $mobil->harga_satuan }}" autofocus required>
                            @error('harga_satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="oldImage" value="{{ $mobil->gambar }}">

                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            @if ($mobil->gambar)
                                <img style="width: 400px; height:400px; object-fit: contain;   object-position: center;"
                                    src="{{ asset('storage/' . $mobil->gambar) }}"
                                    class="img-preview img-fluid mt-3 col-sm-5 rounded float-left">
                            @else
                                <img src="" class="img-preview img-fluid mt-3 col-sm-5">
                            @endif
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                                id="image" accept="image/*" onchange="previewImage()">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="/admin/datamobil" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
