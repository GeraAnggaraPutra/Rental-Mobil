@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
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
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <form action="{{ route('laporan') }} " method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-info text-white"
                                                            id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="from"
                                                        placeholder="Start Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-tdatebg-info text-white"
                                                            id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="to"
                                                        placeholder="End Date">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-outline-info btn-sm"
                                                name="search">Search</button>
                                            <button type="submit" class="btn btn-outline-info btn-sm"
                                                name="exportPDF">PDF</button>
                                            <button type="submit" class="btn btn-outline-info btn-sm"
                                                name="exportExcel">Excel</button>
                                        </div>
                                    </form>
                                    <div class="row mt-3">
                                        <div class="col-md-12">

                                            <!-- Table -->
                                            <div class="table-responsive">
                                                <table class="table table-borderless display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No
                                                            </th>
                                                            <th>No
                                                                Invoice</th>
                                                            <th>
                                                                Tanggal Rental</th>
                                                            <th>
                                                                Tanggal Kembali</th>
                                                            <th>Lama
                                                                Sewa</th>
                                                            <th>
                                                                Total Bayar</th>
                                                            <th>
                                                                Mobil</th>
                                                            <th>Nama
                                                            </th>
                                                            <th>
                                                                Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @foreach ($datas as $data)
                                                            <tr>
                                                                <td>
                                                                    {{ $no++ }}</td>
                                                                <td>
                                                                    {{ $data->invoice_no }}</td>
                                                                <td>
                                                                    {{ $data->tgl_sewa }}</td>
                                                                <td>
                                                                    {{ $data->tgl_kembali }}</td>
                                                                <td>
                                                                    {{ $data->lama_sewa }}</td>

                                                                <td>{{ $data->total_bayar }}</td>
                                                                <td>
                                                                    {{ $data->mobil->nama_mobil }}</td>
                                                                <td>
                                                                    {{ $data->user->detailUser->nama }}</td>
                                                                <td>

                                                                    @if ($data->status == 'Process')
                                                                        @php $color = "success";@endphp
                                                                    @elseif($data->status == 'Selesai')
                                                                        @php $color = "secondary";@endphp
                                                                    @elseif($data->status == 'Dibatalkan')
                                                                        @php $color = "danger";@endphp
                                                                    @endif

                                                                    <span class="bg-{{ $color }} p-1"
                                                                        style="border-radius: 4px">{{ $data->status }}</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
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
