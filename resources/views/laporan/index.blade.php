@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cetak Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Cetak Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Menampilkan Data Berdasarkan Tanggal Rental
                    </div>
                    <div class="card-body">
                         <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <form action="{{ route('laporan.print') }}" method="post">
                                            <td><input type="date" name="tanggal_awal" style="border: none;border-bottom: 2px solid black"></td>
                                            <td><input type="date" name="tanggal_akhir" style="border: none;border-bottom: 2px solid black"></td>
                                            <td>
                                                    @csrf
                                                    <input type="submit" class="btn btn-sm btn-outline-success" value="Print PDF">
                                                </form>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Menampilkan Data Berdasarkan Tanggal Rental</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <!-- Table -->
                                        <div class="table-responsive">
                                            <table class="table table-borderless display nowrap" id="records" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Transaksi</th>
                                                        <th>Lama Sewa</th>
                                                        <th>Tanggal Rental</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>ID Mobil</th>
                                                        <th>ID User</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
