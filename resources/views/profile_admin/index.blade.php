@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                            Profile
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profileadmin.update') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text"
                                        class="form-control form-profile @error('name') is-invalid @enderror" name="name"
                                        value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control form-profile @error('email') is-invalid @enderror"
                                        name="email" value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control form-profile @error('password') is-invalid @enderror"
                                        name="password" placeholder="kosongkan jika password tidak akan diubah">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input class="form-control" type="hidden" name="role" readonly
                                    value="{{ Auth::user()->role }}">
                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <input class="btn btn-primary fw-bold" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @if (Auth::user()->detailUser == null)
                                    <form action="{{ route('profileadmin.store') }}" method="post">
                                    @else
                                        <form action="{{ route('profileadmin.updatedetail') }}" method="post">
                                @endif
                                @csrf
                                @include('layouts/_flash')
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <p class="fw-bold" style="font-size: 22px; color: rgb(39, 36, 36);"><i
                                                        class="nav-icon fas fa-wallet"></i> Saldo Anda : Rp.
                                                    {{ number_format(Auth::user()->saldo, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <p class="form-label fw-bold">Nama</p>
                                            <input type="text" name="nama" placeholder="nama"
                                                class="form-control form-profile @error('name') is-invalid @enderror"
                                                value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->nama }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <p class="form-label fw-bold">Nik</p>
                                            <input type="number" name="nik" placeholder="nik"
                                                class="form-control form-profile @error('nik') is-invalid @enderror"
                                                value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->nik }}">
                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 mt-3">
                                            <p class="form-label fw-bold">No Telepon</p>
                                            <input type="number" name="no_telp" placeholder="No Telepon"
                                                class="form-control form-profile @error('no_telp') is-invalid @enderror"
                                                value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->no_telp }}">
                                            @error('no_telp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 col-md-6 mt-3">
                                            <p class="form-label fw-bold">Email</p>
                                            <input type="email" name="email" placeholder="email"
                                                class="form-control form-profile @error('email') is-invalid @enderror"
                                                value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 mt-3">
                                            <p class="form-label fw-bold">Jenis Kelamin</p>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" value="Laki-laki"
                                                    @if (Auth::user()->detailUser == null) @elseif(Auth::user()->detailUser->jenis_kelamin == 'Laki-laki')
                                                    checked @endif>
                                                <label class="form-check-label">
                                                    Laki - laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" value="Perempuan"
                                                    @if (Auth::user()->detailUser == null) @elseif(Auth::user()->detailUser->jenis_kelamin == 'Perempuan')
                                                    checked @endif>
                                                <label class="form-check-label">
                                                    Perempuan
                                                </label>
                                            </div>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-md-6 mt-3">
                                            <p class="form-label fw-bold">Alamat</p>
                                            <textarea name="alamat" id="" cols="30" rows="2" placeholder="alamat"
                                                class="form-control form-profile @error('alamat') is-invalid @enderror" value="">{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->alamat }}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12 mt-4 mb-4 p-0">
                                            <div>
                                                <input style="width: 100%;" type="submit"
                                                    class="proces btn btn-primary fw-bold" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
