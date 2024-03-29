@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Merk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Merk</li>
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
                        Data Merk
                        <a href="{{ route('merk.create') }}" class="btn btn-primary" style="float: right">
                        Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($merk == !null)
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Merk</th>
                                        <th>Jumlah Mobil</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($merk as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->merk }}</td>
                                            <td>{{ $mobil->where('id_merk', $data->id)->get()->count()}}</td>
                                            <td>
                                                <form action="{{ route('merk.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('merk.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="nav-icon fas fa-edit"></i>

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


