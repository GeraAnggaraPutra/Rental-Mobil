@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
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
                        Transaksi
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Transaksi</label>
                            <input type="text" class="form-control " name="id" value="{{ $transaksi->invoice_no }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Customer</label>
                            <input type="text" class="form-control " name="name" value="{{ $transaksi->user->detailUser->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control " name="nik" value="{{ $transaksi->user->detailUser->nik }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control " name="jenis_kelamin" value="{{ $transaksi->user->detailUser->jenis_kelamin }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control " name="email" value="{{ $transaksi->user->detailUser->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control " name="alamat" value="{{ $transaksi->user->detailUser->alamat }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Bayar</label>
                            <input type="text" class="form-control " name="total_bayar" value="Rp. {{ number_format($transaksi->total_bayar,0,',','.') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="merk" value="{{ $transaksi->mobil->merk }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control " name="nama_mobil" value="{{ $transaksi->mobil->nama_mobil }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Sewa</label>
                            <input type="text" class="form-control " name="tgl_sewa" value="{{ $transaksi->tgl_sewa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="text" class="form-control " name="tgl_kembali" value="{{ $transaksi->tgl_kembali }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lama Sewa</label>
                            <input type="text" class="form-control " name="lama_sewa" value="{{ $transaksi->lama_sewa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Bayar</label>
                            <input type="text" class="form-control " name="total_bayar" value="Rp. {{ number_format($transaksi->total_bayar,0,',','.') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dengan Supir?</label>
                            <input type="text" class="form-control " name="supir" value="{{ $transaksi->supir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('transaksi.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
