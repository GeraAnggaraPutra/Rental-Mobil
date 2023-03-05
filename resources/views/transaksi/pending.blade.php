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
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
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
                            Transaksi Pending
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                               @if($transaksi == !null)
                                <table class="table align-middle">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>No Invoice</th>
                                            <th>Tanggal Rental</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Mobil</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($transaksi as $data)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->invoice_no }}</td>
                                                <td>{{ $data->tgl_sewa }}</td>
                                                <td>{{ $data->tgl_kembali }}</td>
                                                <td>{{ $data->mobil->nama_mobil }}</td>
                                                <td>{{ $data->user->detailUser->nama }}</td>
                                                <td>
                                                    <span class="bg-secondary p-1"
                                                        style="border-radius: 4px">{{ $data->status }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('transaksi.status1', $data->id) }}"
                                                        method="get" class="form-transaksi">
                                                        @csrf
                                                        <a href="{{ route('transaksi.status1', $data->id) }}"
                                                            class="btn btn-sm btn-outline-success show_onrent"
                                                            data-toggle="tooltip" title='On Rent'>
                                                            <i class="nav-icon fas fa-check"></i>
                                                        </a> |
                                                    </form>
                                                    <form action="{{ route('transaksi.status3', $data->id) }}"
                                                        method="get" class="form-transaksi">
                                                        @csrf
                                                        <a href="{{ route('transaksi.status3', $data->id) }}"
                                                            class="btn btn-sm btn-outline-danger show_batalkan"
                                                            data-toggle="tooltip" title='Batalkan' id="show_batalkan">
                                                            <i class="nav-icon fas fa-times"></i>
                                                        </a> |
                                                    </form>
                                                    <form action="{{ route('transaksi.destroy', $data->id) }}"
                                                        method="post" class="form-transaksi">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('transaksi.show', $data->id) }}"
                                                            class="btn btn-sm btn-outline-warning">
                                                            <i class="nav-icon fas fa-eye"></i>
                                                        </a> |
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger show_confirm"
                                                            data-toggle="tooltip" title='Delete'>
                                                            <i class="nav-icon fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
