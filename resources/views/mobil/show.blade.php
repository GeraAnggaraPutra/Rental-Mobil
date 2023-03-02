@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Mobil</li>
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
                        Data Mobil
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control " name="nama_mobil" value="{{ $mobil->nama_mobil }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="merk" value="{{ $mobil->merk->merk }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto Mobil</label>
                            @if(isset($mobil) && $mobil->foto)
                                <p>
                                    <img src="{{ asset('images/mobil/'. $mobil->foto) }}" class="img-rounded img-responsive"
                                    style="width: 75px; height: 75px;" alt="">
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control " name="status" value="{{ $mobil->status }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control " name="harga" value="{{ $mobil->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control " name="tahun" value="{{ $mobil->tahun }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warna</label>
                            <input type="text" class="form-control " name="warna" value="{{ $mobil->warna }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Polisi</label>
                            <input type="text" class="form-control " name="no_polisi" value="{{ $mobil->no_polisi }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('mobil.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
