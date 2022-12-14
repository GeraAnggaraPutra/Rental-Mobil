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
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Transaksi
                        <a href="{{ route('pdf.print') }}" class="btn btn-success text-bold" style="float: right">
                            <i class="nav-icon fas fa-print"></i> Print</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaksi</th>
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
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->tgl_sewa }}</td>
                                            <td>{{ $data->tgl_kembali }}</td>
                                            <td>{{ $data->mobil->nama_mobil }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                @if($data->status == "Process")
                                                     @php $color = "success";@endphp                                                   
                                                @else
                                                     @php $color = "secondary";@endphp
                                                @endif
                                                <span class="bg-{{ $color }} p-1" style="border-radius: 4px">{{ $data->status }}</span></td>
                                            <td>
                                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    @if ($data->status == "Process")
                                                    <a href="{{ route('transaksi.status.process', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="nav-icon fas fa-check"></i>
                                                    </a> |
                                                    @else
                                                    <a href="{{ route('transaksi.status.dibayar', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="nav-icon fas fa-times"></i>
                                                    </a> |
                                                    @endif
                                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="nav-icon fas fa-eye"></i>
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'>
                                                        <i class="nav-icon fas fa-trash-alt"></i> 
                                                    </button>
                                                </form>
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
@endsection