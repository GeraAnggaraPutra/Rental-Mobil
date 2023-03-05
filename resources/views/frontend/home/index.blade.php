@extends('frontend.layouts.user')

@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                        <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia. It is a paradisematic country, in which roasted parts</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What we offer</span>
                    <h2 class="mb-2">Feeatured Vehicles</h2>
                </div>
            </div>
            <div class="row">
@if($mobil == !null)
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($mobil as $data)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url({{ $data->image() }})">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">{{ $data->nama_mobil }}</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ $data->merk->merk }}</span>
                                            <p class="price ml-auto">Rp. {{ number_format($data->harga, 0, ',', '.') }}
                                                <span>/hari</span>
                                            </p>
                                        </div>
                                        @if ($data->status == 'Tidak Tersedia')
                                            <p class="d-flex mb-0 d-block"><a href="#"
                                                    class="btn btn-primary py-2 mr-1 disabled">Tidak
                                                    Tersedia</a>
                                                <a href="{{ route('car.detail', $data->slug) }}"
                                                    class="btn btn-secondary py-2 ml-1">Details</a>
                                            </p>
                                        @else
                                            <p class="d-flex mb-0 d-block"><a
                                                    href="{{ route('cars-transaksi', $data->slug) }}"
                                                    class="btn btn-primary py-2 mr-1">Rent Now</a>
                                                <a href="{{ route('car.detail', $data->slug) }}"
                                                    class="btn btn-secondary py-2 ml-1">Details</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
@else
@endif
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url('{{ asset('frontend/images/about.jpg') }}');">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About</span>
                        <h2 class="mb-4">Selamat Datang Di Car Rent</h2>

                        <p>Car Rent jasa sewa mobil atau rental mobil di Bandung dengan pilihan jenis mobil terlengkap yang
                            bisa Anda pilih sesuai dengan kebutuhan. Dengan harga yang sangat terjangkau Anda sudah bisa
                            menyewa mobil mewah disini seharian penuh.</p>
                        <p>Sebagai rental mobil Bandung pastinya kami selalu mengutamakan kualitas mobil yang akan disewakan
                            dengan rajin melakukan service dan pencucian sehingga selalu dalam kondisi bersih, wangi, dan
                            prima demi menunjang kenyamanan semua penumpang selama perjalanan. Perjalanan Anda terjamin
                            keamanannya bersama dengan driver profesional kami, bekerja dengan penuh tanggung jawab, ramah,
                            dan sudah pasti memiliki pengalaman tahunan, sewa mobil lepas kunci atau plus driver termurah
                            hanya ada di Rent Car.</p>
                        <p><a href="{{ route('cars') }}" class="btn btn-primary py-3 px-4">Cari Mobil</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-3">Our Latest Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Wedding Ceremony</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">City Transfer</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Airport Transfer</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Whole City Tour</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="5">0</strong>
                            <span>Pengalaman <br>Tahun</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="{{ $mobil2->get()->count() }}">0</strong>
                            <span>Total <br>Mobil</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number"
                                data-number="{{ $user->where('role', 'user')->get()->count() }}">0</strong>
                            <span>Happy <br>Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="{{ $transaksi->get()->count() }}">0</strong>
                            <span>Total <br>Perentalan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
