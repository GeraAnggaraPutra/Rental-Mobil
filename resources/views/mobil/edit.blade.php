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
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mobil.update', $mobil->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama Mobil</label>
                                <input type="text" class="form-control  @error('nama_mobil') is-invalid @enderror"
                                    name="nama_mobil" value="{{ $mobil->nama_mobil }}">
                                @error('nama_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Merk</label>
                                <select class="form-control" name="id_merk">
                                    <option disabled></option>
                                    @foreach($merks as $merk)
                                        <option value="{{ $merk->id }}" {{$merk->id == $mobil->id_merk  ? 'selected' : ''}}>{{ $merk->merk}}</option>
                                    @endforeach
                                </select>
                                @error('merk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Mobil</label>
                                @if(isset($mobil) && $mobil->foto)
                                    <p>
                                        <img src="{{ $mobil->image() }}"
                                        class="img-rounded img-responsive" style="width: 75px; height: 75px">
                                    </p>
                                @endif
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                value="{{ asset('images/mobil/').$mobil->foto }}">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror"
                                        type="radio" name="status" value="Tersedia"
                                        @if ($mobil->status == 'Tersedia') checked @endif>
                                    <label class="form-check-label">
                                        Tersedia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror"
                                        type="radio" name="status" value="Tidak Tersedia"
                                        @if ($mobil->status == 'Tidak Tersedia') checked @endif>
                                    <label class="form-check-label">
                                        Tidak Tersedia
                                    </label>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ $mobil->harga }}">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun</label>
                                <input type="number" class="form-control  @error('tahun') is-invalid @enderror"
                                    name="tahun" value="{{ $mobil->tahun }}">
                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" class="form-control  @error('warna') is-invalid @enderror"
                                    name="warna" value="{{ $mobil->warna }}">
                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control  @error('no_polisi') is-invalid @enderror"
                                    name="no_polisi" value="{{ $mobil->no_polisi }}">
                                @error('no_polisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
