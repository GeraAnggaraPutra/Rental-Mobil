@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Mobil
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mobil.update', $mobil->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Merk</label>
                                <input type="text" class="form-control  @error('merk') is-invalid @enderror"
                                    name="merk" value="{{ $mobil->merk }}">
                                @error('merk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                                <label class="form-label">Foto Mobil</label>
                                @if(isset($mobil) && $mobil->foto)
                                    <p>
                                        <img src="{{ asset('images/mobil/'). $mobil->foto }}" 
                                        class="img-rounded img-responsive" style="width: 75px; height: 75px">
                                    </p>
                                @endif
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                value="{{ $mobil->nama }}">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control  @error('stock') is-invalid @enderror"
                                    name="stock" value="{{ $mobil->stock }}">
                                @error('stock')
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