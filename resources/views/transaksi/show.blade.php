@extends('layouts.admin')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Transaksi
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">No Transaksi</label>
                            <input type="text" class="form-control " name="id" value="{{ $transaksi->id }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pesan</label>
                            <input type="text" class="form-control " name="tgl_pesan" value="{{ $transaksi->tgl_pesan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control " name="harga" value="{{ $transaksi->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('transaksi.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection