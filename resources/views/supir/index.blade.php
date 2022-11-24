@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Supir</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Supir</li>
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
                        Data Supir
                        <a href="{{ route('supir.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        <i class="fas fa-plus"> Tambah Data</i>
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($supir as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @php
                                                if($data->status == 'Online'){
                                                    $color = 'success';
                                                }else {
                                                    $color = 'danger';
                                                }
                                            @endphp
                                            <td class="text-<?= $color ?> text-bold">{{ $data->status }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>
                                                <form action="{{ route('supir.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('supir.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a> |
                                                    <a href="{{ route('supir.show', $data->id) }}"
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