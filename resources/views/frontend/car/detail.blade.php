@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Detail <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Detail</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-7 pb-5 pe-lg-5">
                    <div class="row">
                        <div class="col-12 p-5">
                            <img src="{{ $mobil->image() }}" alt="">
                        </div>
                        <div class="row m-0 bg-light">
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="text-muted">Nama Mobil</p>
                                <p class="h5">{{ $mobil->nama_mobil }}</p>
                            </div>
                            <div class="col-md-4 col-6  ps-30 my-4">
                                <p class="text-muted">Merk</p>
                                <p class="h5 m-0">{{ $mobil->merk }}</p>
                            </div>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="text-muted">Harga</p>
                                <p class="h5 m-0">Rp. {{ number_format($mobil->harga, 0, ',', '.') }}/hari</p>
                            </div>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="text-muted">Warna</p>
                                <p class="h5 m-0">{{ $mobil->warna }}</p>
                            </div>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="text-muted">Tahun</p>
                                <p class="h5 m-0">{{ $mobil->tahun }}</p>
                            </div>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="text-muted">Nomor Polisi</p>
                                <p class="h5 m-0">{{ $mobil->no_polisi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-0 ps-lg-4">
                    <div class="row m-0">
                        <div class="col-12 px-4">
                            <div class="d-flex align-items-end mt-4 mb-2">
                                <p class="h4 m-0">{{ $mobil->nama_mobil }}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Merk</p>
                                <p class="fs-14 fw-bold">{{ $mobil->merk }}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Stock</p>
                                <p class="fs-14 fw-bold">{{ $mobil->stock }}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Harga</p>
                                <p class="fs-14 fw-bold">Rp. {{ number_format($mobil->harga, 0, ',', '.') }}/hari</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <p class="textmuted fw-bold">Biaya Tambahan JIka Dengan Supir Rp. 80.000</p>
                            </div>
                        </div>
                        @csrf
                        <div class="col-12 px-0">
                            <div class="col-12 mt-4 mb-4 p-0">
                                <div>
                                    @if ($mobil->stock <= 0)
                                        <p class="d-flex mb-0 d-block"><a href="#"
                                                class="btn btn-primary py-2 mr-1">Tidak
                                                Tersedia</a>
                                        </p>
                                    @else
                                        <p class="d-flex mb-0 d-block"><a href="{{ route('cars-transaksi', $data->slug) }}"
                                                class="btn btn-primary py-2 mr-1">Rent Now</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
