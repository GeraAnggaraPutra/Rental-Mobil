@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Mobil
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="merk" value="{{ $mobil->merk }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control " name="nama_mobil" value="{{ $mobil->nama_mobil }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="text" class="form-control " name="stock" value="{{ $mobil->stock }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control " name="harga" value="{{ $mobil->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('mobil.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection