<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Logout</title>
    <!-- Bootstrap CSS -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>

                </ul>
                <form action="{{ route('logout_customer') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" onclick="logout()">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-4">
        <div class="col-md-12 text-center">
            <h1 class="text-center">Welcome Back {{ Auth::guard('customer')->user()->nama_lengkap }} !</h1>
            <a href="/" class="btn btn-success btn-lg">Pesan Mobil Disini</a>
        </div>

        <!-- Example Card Section -->
        <div class="row mt-4">
            <div class="container mt-5">
                <h2 class="mb-4">Daftar Transaksi</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>

                            <th>Mobil</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transaction->count())
                            @foreach ($transaction as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->car->merk }}</td>
                                    <td>{{ $item->tanggal_mulai }}</td>
                                    <td>{{ $item->tanggal_akhir }}</td>
                                    <td>{{ $item->formattedPrice }}</td>
                                    <td>
                                        @if ($item->status == 'confirmed')
                                            <span class="badge bg-success">Selesai</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($item->status == 'pending')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#modalHapus{{ $item->id }}">
                                                Batalkan Transaksi
                                            </button>
                                        @else
                                            <a href="{{ route('transaksi.show', $item->id) }}"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data</td>
                            </tr>
                        @endif



                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- modal Hapus -->
    @foreach ($transaction as $item)
        <div class="modal fade" id="modalHapus{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Batalkan Transaksi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <span>Apakah anda yakin ingin membatalkan transaksi Sewa
                                <strong>{{ $item->car->merk }} | {{ $item->formattedPrice }}</strong>
                                ?</span>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Batalkan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- /.End modal Hapus -->

    <!-- JavaScript Logout Function -->
    <script>
        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                alert("You have successfully logged out!");
                window.location.href = "/"; // Redirect to login page
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
