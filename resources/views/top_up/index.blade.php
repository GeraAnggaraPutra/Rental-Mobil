@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Top Up</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Top Up</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        @include('top_up.create')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @include('layouts/_flash')
                    <div class="card">
                        <div class="card-header">
                            Top Up
                            <button class="btn btn-success text-bold" data-toggle="modal" data-target="#topup" style="float: right">
                                 Top Up</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                            @if($topup == !null)
                                <table class="table align-middle" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Jumlah Saldo</th>
                                            <th>Jumlah Top Up</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tanggal</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($topup as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>Rp. {{ number_format($data->user->saldo, 0, ',', '.') }}</td>
                                                <td>Rp. {{ number_format($data->jumlah_saldo, 0, ',', '.') }}</td>
                                                <td>{{ $data->metode_pembayaran }}</td>
                                                <td>{{ $data->created_at->format('Y-m-d') }} {{ $data->created_at->format('h:i:s A') }}</td>
                                                <td>
                                                    {{-- <form action="{{ route('pembayaran.destroy', $data->id) }}"
                                                        method="post" class="form-pembayaran">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('pembayaran.show', $data->id) }}"
                                                            class="btn btn-sm btn-outline-warning">
                                                            <i class="nav-icon fas fa-eye"></i>
                                                        </a> |
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger show_confirm"
                                                            data-toggle="tooltip" title='Delete'>
                                                            <i class="nav-icon fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <p>Tidak ada data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
