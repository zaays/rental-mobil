@extends('backend.layouts.backend')
@section('content')
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar customer</h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i>
                Tambah
                Data customer </button> --}}

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th width="60px">#</th>
                        <th>Nama customer</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Handphone</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($customer as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $item->nama_lengkap }} </td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            {{-- <td>
                                <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                                    Edit</a>

                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modalHapus{{ $item->id }}"><i class="fas fa-trash"></i>
                                    Hapus</button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal Tambah -->
    {{-- <div class="modal fade" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="f" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="merk">Nama customer</label>
                            <input type="text" name="merk"
                                class="form-control @error('merk') is-invalid @enderror mb-3" id="merk"
                                placeholder="Ex: Kijang Innova" required>
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="merk">Nomor Polisi</label>
                            <input type="text" name="no_polisi"
                                class="form-control @error('no_polisi') is-invalid @enderror" id="no_polisi"
                                placeholder="Ex: BE 2133 PP" required>
                            @error('no_polisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="merk">Harga Sewa/Hari</label>
                            <input type="number" name="harga_satuan"
                                class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                                placeholder="1500000" required>
                            @error('no_polisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merk">Gambar</label>
                            <img src="" class="img-preview img-fluid mt-3 col-sm-5">
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                                id="image" accept="image/*" onchange="previewImage()">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
    <!-- /.End modal Tambah -->


    <!-- modal Hapus -->
    @foreach ($customer as $item)
        <div class="modal fade" id="modalHapus{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <span>Apakah anda yakin ingin menghapus data customer <strong>{{ $item->merk }}</strong>
                                ?</span>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- /.End modal Hapus -->
@endsection

{{-- 
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
@endpush --}}
