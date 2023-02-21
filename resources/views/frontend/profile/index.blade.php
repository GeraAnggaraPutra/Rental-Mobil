@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            @if (Auth::user()->detailUser == null)
                <form action="{{ route('profile.create', Auth::user()->id) }}" method="post">
                @else
                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
            @endif
            @csrf
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <p class="text-muted">Nama</p>
                        <input type="text" name="nama" placeholder="nama"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->nama }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <p class="text-muted">Nik</p>
                        <input type="number" name="nik" placeholder="nik"
                            class="form-control @error('nik') is-invalid @enderror"
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
                        <p class="text-muted">No Telepon</p>
                        <input type="number" name="no_telp" placeholder="No Telepon"
                            class="form-control @error('no_telp') is-invalid @enderror"
                            value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->no_telp }}">
                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-sm-6 col-md-6 mt-3">
                        <p class="text-muted">Email</p>
                        <input type="email" name="email" placeholder="email"
                            class="form-control @error('email') is-invalid @enderror"
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
                        <p class="text-muted">Jenis Kelamin</p>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                name="jenis_kelamin" value="Laki-laki"
                                @if (Auth::user()->detailUser == null) @elseif(Auth::user()->detailUser->jenis_kelamin == 'Laki-laki')
                                checked @endif>
                            <label class="form-check-label">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                name="jenis_kelamin" value="Perempuan"
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
                        <p class="text-muted">Alamat</p>
                        <input type="text" name="alamat" placeholder="alamat"
                            class="form-control @error('alamat') is-invalid @enderror"
                            value="{{ Auth::user()->detailUser == null ? '' : Auth::user()->detailUser->alamat }}">
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
                            <input type="submit" class="proces btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
