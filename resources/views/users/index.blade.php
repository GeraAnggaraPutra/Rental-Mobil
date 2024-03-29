@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Users</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    Data Users
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary" style="float: right;">
                                        Tambah Data
                                    </a>
                                    <a href="{{ route('users.export') }}" class="btn btn-success"
                                        style="float: right; margin-right: 4px">
                                        Export
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Saldo</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($users as $data)
                                            <tr>
                                                @if (Auth::user() && $data->name == Auth::user()->name)
                                                @else
                                                    @if (Auth::user()->role == 'super admin')
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>Rp. {{ number_format($data->saldo, 0, ',', '.') }}
                                                        </td>
                                                        @if ($data->role == 'admin')
                                                            <td class="fw-bold text-primary">{{ $data->role }}</td>
                                                        @else
                                                            <td class="fw-bold text-success">{{ $data->role }}</td>
                                                        @endif
                                                        <td>
                                                            @if (Auth::user()->role == 'super admin')
                                                                <form action="{{ route('users.destroy', $data->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a href="{{ route('users.edit', $data->id) }}"
                                                                        class="btn btn-sm btn-outline-success">
                                                                        <i class="nav-icon fas fa-edit"></i>
                                                                    </a> |
                                                                    <a href="{{ route('users.show', $data->id) }}"
                                                                        class="btn btn-sm btn-outline-warning">
                                                                        <i class="nav-icon fas fa-eye"></i>

                                                                    </a> |
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger show_confirm"
                                                                        data-toggle="tooltip" title='Delete'>
                                                                        <i class="nav-icon fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            @elseif (Auth::user()->role == 'admin')
                                                                @if ($data->role == 'admin')
                                                                @else
                                                                    <form action="{{ route('users.destroy', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{ route('users.edit', $data->id) }}"
                                                                            class="btn btn-sm btn-outline-success">
                                                                            <i class="nav-icon fas fa-edit"></i>
                                                                        </a> |
                                                                        <a href="{{ route('users.show', $data->id) }}"
                                                                            class="btn btn-sm btn-outline-warning">
                                                                            <i class="nav-icon fas fa-eye"></i>

                                                                        </a> |
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger show_confirm"
                                                                            data-toggle="tooltip" title='Delete'>
                                                                            <i class="nav-icon fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    @else
                                                        @if ($data->role == 'admin')
                                                        @elseif ($data->role == 'super admin')
                                                        @else
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->email }}</td>
                                                            <td>Rp. {{ number_format($data->saldo, 0, ',', '.') }}
                                                            <td class="fw-bold text-success">{{ $data->role }}</td>
                                                            <td>
                                                                <form action="{{ route('users.destroy', $data->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a href="{{ route('users.edit', $data->id) }}"
                                                                        class="btn btn-sm btn-outline-success">
                                                                        <i class="nav-icon fas fa-edit"></i>
                                                                    </a> |
                                                                    <a href="{{ route('users.show', $data->id) }}"
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
                                                        @endif
                                                    @endif
                                                @endif
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
