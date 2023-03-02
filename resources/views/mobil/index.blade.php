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
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Mobil
                        <a href="{{ route('mobil.create') }}" class="btn btn-primary" style="float: right">
                        Tambah Data
                        </a>

                        <a href="{{ route('mobil.export') }}" class="btn btn-success" style="float: right; margin-right:5px">
                        Export Excel
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mobil</th>
                                        <th>Merk</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($mobil as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_mobil }}</td>
                                            <td>{{ $data->merk->merk }}</td>
                                            <td>
                                            <img src="{{ $data->image() }}" style="width: 140px; height: 140px; border-radius: 12px;">
                                            </td>
                                            @if ($data->status == "Tersedia")
                                            <td><span class="bg-success" style="border-radius:5px; padding: 5px">{{ $data->status }}</span></td>
                                            @else
                                            <td><span class="bg-secondary" style="border-radius:5px; padding: 5px">{{ $data->status }}</span></td>
                                            @endif
                                            <td>Rp. {{ number_format($data->harga,0,',','.') }}/hari</td>
                                            <td>
                                                <form action="{{ route('mobil.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('mobil.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="nav-icon fas fa-edit"></i>

                                                    </a> |
                                                    <a href="{{ route('mobil.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="nav-icon fas fa-eye"></i>

                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger show_confirm_mobil" data-toggle="tooltip" title='Delete'>
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


