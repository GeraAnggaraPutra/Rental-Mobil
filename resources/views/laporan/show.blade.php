@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Laporan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Customer</label>
                            <input type="text" class="form-control " name="nama" value="{{ $mobil->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pesan</label>
                            <input type="text" class="form-control " name="tgl_pesan" value="{{ $mobil->tgl_pesan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobil</label>
                            <input type="text" class="form-control " name="harga" value="{{ $mobil->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lama Sewa</label>
                            <input type="text" class="form-control " name="lama_sewa" value="{{ $mobil->lama_sewa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('laporan.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection