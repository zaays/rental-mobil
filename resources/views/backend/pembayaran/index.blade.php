@extends('backend.layouts.backend')
@section('content')
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran</h6>
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

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th width="60px">#</th>
                        <th>Pemesan</th>
                        <th>Mobil yang disewa</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pembayaran as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $item->transaction->customer->nama_lengkap }} </td>
                            <td> {{ $item->transaction->car->merk }} </td>
                            <td> {{ $item->formattedPrice }} </td>
                            <td>
                                @if ($item->status == 'paid')
                                    <span class="badge bg-success text-light">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-warning">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>

                                <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#modalDetail{{ $item->id }}"><i class="fas fa-eye"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal ID -->
    @foreach ($pembayaran as $item)
        <div class="modal fade" id="modalDetail{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bukti Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pembayaran.confirm', $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="merk">Bukti Pembayaran</label>
                                <img class="card-img-top" style="max-height: 750px"
                                    src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Dist Photo 1">
                            </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        @if ($item->status == 'pending')
                            <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                        @endif
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- /.End modal Tambah -->


    <!-- modal Hapus -->
    {{-- @foreach ($customer as $item)
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
    @endforeach --}}
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
