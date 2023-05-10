@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pembayaran Transfer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembayaran Transfer</li>
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
                            Pembayaran Transfer
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($pembayaran == !null)
                                    <table class="table align-middle">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>User</th>
                                                <th>ID Transaksi</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Status</th>
                                                <th>Bukti Transfer</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($pembayaran as $data)
                                                <tr class="text-center">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->transaksi->user->name }}</td>
                                                    <td>{{ $data->transaksi->invoice_no }}</td>
                                                    <td>{{ $data->metode_pembayaran }}</td>
                                                    <td>
                                                        @if ($data->status == 'Dibayar')
                                                            @php $color = "success";@endphp
                                                        @elseif($data->status == 'Pending')
                                                            @php $color = "secondary";@endphp
                                                        @else
                                                            @php $color = "danger";@endphp
                                                        @endif
                                                        <span class="bg-{{ $color }} p-1"
                                                            style="border-radius: 4px">{{ $data->status }}</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ $data->image() }}"
                                                            style="width: 140px; height: 140px; border-radius: 12px;">
                                                    </td>
                                                    <td class="d-flex">
                                                        @if($data->status == "Dibayar") 
                                                    <form action="{{ route('transfer.dibatalkan', $data->id) }}"
                                                        method="get" class="form-transfer">
                                                        @csrf
                                                        <a href="{{ route('transfer.dibatalkan', $data->id) }}"
                                                            class="btn btn-sm btn-outline-danger show_batalkan"
                                                            data-toggle="tooltip" title='Batalkan' id="show_batalkan">
                                                            <i class="nav-icon fas fa-times"></i>
                                                        </a>
                                                    </form>
                                                    @elseif($data->status == "Dibatalkan")
                                                    {{''}}
                                                    @elseif($data->status == "Pending")
                                                    <form action="{{ route('transfer.dibayar', $data->id) }}"
                                                        method="get" class="form-transfer">
                                                        @csrf
                                                        <a href="{{ route('transfer.dibayar', $data->id) }}"
                                                            class="btn btn-sm btn-outline-success show_transfer1"
                                                            data-toggle="tooltip" title='Dibayar'>
                                                            <i class="nav-icon fas fa-check"></i>
                                                        </a> 
                                                    </form>
                                                    &nbsp;&nbsp;
                                                    <form action="{{ route('transfer.dibatalkan', $data->id) }}"
                                                        method="get" class="form-transfer">
                                                        @csrf
                                                        <a 
                                                            class="btn btn-sm btn-outline-danger show_batalkan"
                                                            data-toggle="tooltip" title='Batalkan' id="show_batalkan">
                                                            <i class="nav-icon fas fa-times"></i>
                                                        </a>
                                                    </form>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    <a href="{{ route('transfer.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="nav-icon fas fa-eye"></i>
                                                    </a>
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
