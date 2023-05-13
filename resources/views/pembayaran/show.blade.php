@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Pembayaran Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pembayaran Transaksi
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control " value="{{ $pembayaran->transaksi->user->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Transaksi</label>
                            <input type="text" class="form-control " value="{{ $pembayaran->transaksi->invoice_no }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Yang Harus Dibayar</label>
                            <input type="text" class="form-control " value="Rp. {{ number_format($pembayaran->transaksi->total_bayar, 0, ',', '.') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto Bukti Transfer</label>
                            @if(isset($pembayaran) && $pembayaran->bukti_transfer)
                                <p>
                                    <img src="{{ asset('images/bukti-transfer/'. $pembayaran->bukti_transfer) }}" class="img-rounded img-responsive"
                                    style="width: auto; height: 400px;" alt="">
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control " value="{{ $pembayaran->status }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
