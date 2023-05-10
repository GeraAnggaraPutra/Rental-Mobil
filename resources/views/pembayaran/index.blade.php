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
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
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
                            Pembayaran
                            {{-- <a href="{{ route('pdf.print') }}" class="btn btn-success text-bold" style="float: right">
                                 Print PDF</a>

                            <a href="{{ route('pembayaran.export') }}" class="btn btn-success text-bold"
                                style="float: right; margin-right:5px">
                                Export Excel
                            </a> --}}
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                            @if($pembayaran == !null)
                                <table class="table align-middle">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>User</th>
                                            <th>ID Transaksi</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status</th>
                                            {{-- <th>Aksi</th> --}}
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
