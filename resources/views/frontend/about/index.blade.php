@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('frontend/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">About</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('frontend/images/about.jpg')}}');">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About</span>
	            <h2 class="mb-4">Selamat Datang Di Car Rent</h2>

	            <p>Car Rent jasa sewa mobil atau rental mobil di Bandung dengan pilihan jenis mobil terlengkap yang bisa Anda pilih sesuai dengan kebutuhan. Dengan harga yang sangat terjangkau Anda sudah bisa menyewa mobil mewah disini seharian penuh.</p>
	            <p>Sebagai rental mobil Bandung pastinya kami selalu mengutamakan kualitas mobil yang akan disewakan dengan rajin melakukan service dan pencucian sehingga selalu dalam kondisi bersih, wangi, dan prima demi menunjang kenyamanan semua penumpang selama perjalanan. Perjalanan Anda terjamin keamanannya bersama dengan driver profesional kami, bekerja dengan penuh tanggung jawab, ramah, dan sudah pasti memiliki pengalaman tahunan, sewa mobil lepas kunci atau plus driver termurah hanya ada di Rent Car.</p>
	            <p><a href="{{ route('cars') }}" class="btn btn-primary py-3 px-4">Cari Mobil</a></p>
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
                <strong class="number" data-number="{{$mobil->get()->count()}}">0</strong>
                <span>Total <br>Mobil</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="{{$user->where('role','user')->get()->count()}}">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="{{$transaksi->get()->count()}}">0</strong>
                <span>Total <br>Perentalan</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>

@endsection
