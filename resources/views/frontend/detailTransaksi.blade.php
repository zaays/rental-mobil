@extends('frontend.layout.app')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container ">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Pembayaran Sewa Mobil</h1>
            </div>
        </div>
    </header>
    <!-- Section-->


    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Silahkan Lakukan Pembayaran
                </div>

                <a href="{{ route('customer-dashboard') }}" class="btn btn-warning btn-md mb-2">Kembali</a>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">

                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Rent Car
                                <small class="float-right">Date: {{ $transaction->created_at }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Penyewa
                            <address>
                                <strong>{{ $transaction->customer->nama_lengkap }}</strong><br>
                                Alamat: {{ $transaction->customer->alamat }}<br>
                                Alamat: {{ $transaction->customer->no_hp }}<br>
                                Email: {{ $transaction->customer->email }}
                            </address>
                        </div>

                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Mobil</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Total Bayar</th>
                                        <th>Status Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $transaction->car->merk }}</td>
                                        <td>{{ $transaction->tanggal_mulai }}</td>
                                        <td>{{ $transaction->tanggal_akhir }}</td>
                                        <td>{{ $transaction->formattedPrice }}</td>
                                        <td>
                                            @if ($transaction->status == 'pending')
                                                <span class="badge bg-warning">{{ $transaction->status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $transaction->status }}</span>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <form action="{{ route('transaksi.pay', $transaction->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @if ($transaction->status == 'pending')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="merk">Bukti Pembayaran</label>
                                        <img src="" class="img-preview img-fluid mt-3 col-sm-5">
                                        <input type="file" name="bukti_pembayaran"
                                            class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                            id="image" accept="image/*" onchange="previewImage()" required>
                                        @error('bukti_pembayaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="{{ asset('adminlte/dist/img/credit/visa.png') }}" alt="Visa">
                                <img src="{{ asset('adminlte/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                                <img src="{{ asset('adminlte/dist/img/credit/american-express.png') }}"
                                    alt="American Express">
                                <img src="{{ asset('adminlte/dist/img/credit/paypal2.png') }}" alt="Paypal">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{ $transaction->formattedPrice }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <div class="row no-print">
                            <div class="col-12">
                                @if ($transaction->status == 'pending')
                                    @csrf
                                    <button type="submit" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Bayar
                                        Sekarang</button>
                                @endif

                    </form>
                    {{-- @foreach ($transaction->payments as $payment)
                                <p>Status Pembayaran: {{ ucfirst($payment->status) }}</p>
                                @if ($payment->status == 'pending')
                                    <form action="{{ route('payments.confirm', $payment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                                    </form>
                                @endif
                            @endforeach --}}
                    {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a> --}}

                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </div>
@endsection
