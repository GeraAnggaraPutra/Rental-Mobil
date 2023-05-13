@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Pembayaran <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Pembayaran</h1>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.profile.components.topup')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0 ps-lg-4">
                    <div class="row" style="display: grid; place-content: center;">
                        {{-- <div class="col-12 px-4"> --}}
                        <div class="container mt-2 p-4 h-auto shadow"
                            style="background-color:#fff; border: 1px solid #eee6e6; border-radius: 10px; margin: 0 auto;width:750px;">
                            <table style="margin:0 auto;width:740px;">
                                <h1 class="fa-2x text-green font-weight-bold">
                                    RENTAL MOBIL BANDUNG
                                </h1>
                                <thead>
                                    <tr class="p-4">
                                        <th colspan="3">Transaksi <strong>{{ $transaksi->invoice_no }}</strong></th>
                                        <th>{{ $transaksi->created_at->format('D, d M Y') }}</th>
                                    </tr>
                                    <tr class="p-4">
                                        <td colspan="2">
                                            <h4>Perusahaan: </h4>
                                            <p>RentCar.<br>
                                                Jl. Situ Tarate<br>
                                                085343966997<br>
                                                support@carrent.id
                                            </p>
                                        </td>
                                        <td colspan="2">
                                            <h4>Pelanggan: </h4>
                                            <p>{{ $transaksi->user->detailUser->nama }}<br>
                                                {{ $transaksi->user->detailUser->alamat }}<br>
                                                {{ $transaksi->user->detailUser->no_telp }} <br>
                                                {{ $transaksi->user->detailUser->email }}
                                            </p>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="p-4">
                                        <th>Mobil</th>
                                        <th>No Polisi</th>
                                        <th>Tambahan Supir</th>
                                        <th>Warna</th>
                                    </tr>
                                    <tr class="p-4">
                                        <td>{{ $transaksi->mobil->nama_mobil }}</td>
                                        <td>{{ $transaksi->mobil->no_polisi }}</td>
                                        <td>{{ $transaksi->supir }}</td>
                                        <td>{{ $transaksi->mobil->warna }}</td>
                                    </tr>
                                    <tr class="p-4">
                                        <th>Tanggal Rental</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Lama Sewa</th>
                                        <th>Harga</th>
                                    </tr>
                                    <tr class="p-4">
                                        <td>{{ $transaksi->tgl_sewa }}</td>
                                        <td>{{ $transaksi->tgl_kembali }}</td>
                                        <td>{{ $transaksi->lama_sewa }} Hari</td>
                                        <td>Rp. {{ number_format($transaksi->mobil->harga) }}</td>
                                    </tr>
                                    <tr class="p-4">
                                        <th colspan="3">Total</th>
                                        <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            *Biaya Tambahan Jika Dengan Supir Rp. 80.000/hari
                        </div>
                        {{-- <div class="row d-flex align-items-end mt-4 mb-2">
                                <p class="h4 m-0">{{ $transaksi->mobil->nama_mobil }}</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Merk</p>
                                <p class="col-6 fs-14 fw-bold">{{ $transaksi->mobil->merk->merk }}</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Harga</p>
                                <p class="col-6 fs-14 fw-bold">Rp.
                                    {{ number_format($transaksi->mobil->harga, 0, ',', '.') }}/hari</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Lama Sewa</p>
                                <p class="col-6 fs-14 fw-bold">{{ $transaksi->lama_sewa }}</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Dengan Supir</p>
                                <p class="col-6 fs-14 fw-bold">{{ $transaksi->supir }}</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Tanggal Sewa</p>
                                <p class="col-6 fs-14 fw-bold">{{ $transaksi->tgl_sewa }} - {{ $transaksi->tgl_kembali }}</p>
                            </div>
                            <div class="row d-flex justify-content-between mb-2">
                                <p class="col-6 textmuted">Total Bayar</p>
                                <p class="col-6 fs-14 fw-bold">Rp. {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
                            </div>
                         </div> --}}
                        <form action={{ route('pembayaran.store') }} method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="col-12 px-0"> --}}
                            {{-- <div class="row bg-light m-0"> --}}
                            <div class="row">
                                <div class="col-12 px-4 mt-4">
                                    <p class="fw-bold">Pembayaran</p>
                                </div>
                                {{-- <div class="col-sm-12 col-md-12 mt-3"> --}}
                                <p class="font-weight-bold">Pilih Metode Pembayaran</p>
                                <div class="row" style="justify-content: space-between">
                                    <div class="col-3 col-sm-3 col-md-3 form-check">
                                        <input class="form-check-input @error('metode_pembayaran') is-invalid @enderror"
                                            style="cursor: pointer" type="radio" name="metode_pembayaran" value="COD"
                                            id="cod" onclick="show1()">
                                        <label class="form-check-label font-weight-bold" for="cod">
                                            COD
                                        </label>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 form-check">
                                        <input class="form-check-input @error('metode_pembayaran') is-invalid @enderror"
                                            style="cursor: pointer" type="radio" name="metode_pembayaran" value="Wallet"
                                            id="wallet" onclick="show2()">
                                        <label class="form-check-label font-weight-bold" for="wallet">
                                            Wallet
                                        </label>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 form-check">
                                        <input class="form-check-input @error('metode_pembayaran') is-invalid @enderror"
                                            style="cursor: pointer" type="radio" name="metode_pembayaran" value="Transfer"
                                            id="transfer" onclick="show3()">
                                        <label class="form-check-label font-weight-bold" for="transfer">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 form-check">
                                        <input class="form-check-input @error('metode_pembayaran') is-invalid @enderror"
                                            style="cursor: pointer" type="radio" name="metode_pembayaran" value="Midtrans"
                                            onclick="show1()" id="pay-button">
                                        {{-- <a for="midtrans" class="btn btn-primary @error('metode_pembayaran') is-invalid @enderror" style="cursor: pointer"" id="pay-button">Midtrans</a> --}}
                                        <label class="form-check-label font-weight-bold" for="pay-button">
                                            Lainnya
                                        </label>
                                    </div>
                                    @error('metode_pembayaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row d-none" id="transfer-box">
                                <div class="col-sm-12 mb-3" >
                                    <p class="text-muted">Foto Bukti Transfer</p>
                                    <input type="file" name="bukti_transfer"
                                        class="form-control @error('bukti_transfer') is-invalid @enderror">
                                    <p>Silahkan transfer Rp.
                                        {{ number_format($transaksi->total_bayar, 0, ',', '.') }} ke rekening :
                                        xxxxxxxxxx</p>
                                    @error('bukti_transfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row d-none" id="wallet-box">
                                <div class="col-sm-12 mb-3">
                                    <p class="text-muted" style="font-size: 22px">
                                        <i class="nav-icon fas fa-wallet"></i> Saldo Anda : Rp.
                                        {{ number_format(Auth::user()->saldo, 0, ',', '.') }}
                                    </p>
                                    <button class="btn-sm btn-success shadow-lg" type="button" data-toggle="modal"
                                        data-target="#topup">Isi Saldo</button>
                                </div>
                            </div>
                            {{-- </div> --}}
                            <div class="row m-0">
                                <div class="col-12 mt-4 mb-4 p-0">
                                    <div>
                                        <input type="submit" class="proces btn btn-primary" value="Bayar">
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('change', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!"); console.log(result);
                    swal({
                            title: `Success`,
                            text: "Payment success!",
                            icon: "success",
                            button: "OK"
                        })
                        .then(function() {
                            window.location.assign("{{ route('cars') }}");
                        })
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("waiting for your payment!");
                    console.log(result);
                    swal({
                            title: `Pending`,
                            text: "Waiting for your payment!",
                            icon: "info",
                            button: "OK"
                        })
                        .then(function() {
                            window.location.assign("{{ route('cars') }}");
                        })
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>


    <script>
        function show3() {
            document.getElementById('transfer-box').className = 'row';
            document.getElementById('wallet-box').className = 'row d-none';
        }

        function show2() {
            document.getElementById('wallet-box').className = 'row';
            document.getElementById('transfer-box').className = 'row d-none';
        }

        function show1() {
            document.getElementById('transfer-box').className = 'row d-none';
            document.getElementById('wallet-box').className = 'row d-none';
        }
    </script>
@endsection
