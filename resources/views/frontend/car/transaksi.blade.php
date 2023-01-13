@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('frontend/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Transaksi <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Transaksi</h1>
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
                        <img src="{{ $mobil->image() }}"
                            alt="">
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
                            <p class="h5 m-0">Rp. {{ number_format($mobil->harga,0,',','.') }}</p>
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
                            <p class="fs-14 fw-bold">Rp. {{ number_format($mobil->harga,0,',','.') }}/hari</p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Biaya Tambahan JIka Dengan Supir</p>
                            <div class="d-flex align-text-top ">
                                Rp. 80.000
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                     <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Lengkapi Data</p>
                            </div>
                            @if (Auth::user()->detailUser == null)
                            <div class="col-12 px-4">
                                <div class="d-flex mb-4">
                                    <span class="mr-3">
                                        <p class="text-muted">Nama</p>
                                        <input type="text" name="name" placeholder="name" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                         <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                    </span>
                                    <input class="form-control" type="hidden" name="id_mobil" readonly value="{{ $mobil->id }}">
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <span class="">
                                            <p class="text-muted">Nik</p>
                                            <input type="number" name="nik" placeholder="nik" class="form-control @error('nik') is-invalid @enderror">
                                            @error('nik')
                                             <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                             @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex  mb-4">
                                    <span class="mr-3">
                                        <p class="text-muted">No Telepon</p>
                                        <input type="number" name="no_telp" placeholder="No Telepon" class="form-control @error('no_telp') is-invalid @enderror">
                                        @error('no_telp')
                                         <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <span class="">
                                            <p class="text-muted">Email</p>
                                            <input type="email" name="email" placeholder="email" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                             <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                             @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5 mr-3">
                                        <p class="text-muted">Jenis Kelamin</p>
                                        <div class="form-check">
                                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                type="radio" name="jenis_kelamin" value="Laki-laki">
                                            <label class="form-check-label">
                                                Laki - laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                type="radio" name="jenis_kelamin" value="Perempuan">
                                            <label class="form-check-label">
                                                Perempuan
                                            </label>
                                        </div>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <span class="">
                                            <p class="text-muted">Alamat</p>
                                            <textarea name="alamat" style="width: 100%;height:100%;" placeholder="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                            @error('alamat')
                                             <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                             @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Lama Sewa(hari)</p>
                                        <input type="number" name="lama_sewa" placeholder="lama sewa" class="form-control @error('lama_sewa') is-invalid @enderror">
                                        @error('lama_sewa')
                                         <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                    </span>
                                    <span class="">
                                        <p class="text-muted"></p>
                                        <input class="form-control" type="hidden" name="id_mobil" readonly value="{{ $mobil->id }}">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Tanggal Sewa</p>
                                        <input type="date" placeholder="DATE" class="form-control2 @error('tgl_sewa') is-invalid @enderror"
                                        name="tgl_sewa">
                                        @error('tgl_sewa')
                                         <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Supir?</p>
                                        <div class="form-check">
                                            <input class="form-check-input @error('supir') is-invalid @enderror"
                                                type="radio" name="supir" value="Yes">
                                            <label class="form-check-label">
                                                Dengan Supir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('supir') is-invalid @enderror"
                                                type="radio" name="supir" value="No">
                                            <label class="form-check-label">
                                                Tanpa Supir
                                            </label>
                                        </div>
                                        @error('supir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Tanggal Kembali</p>
                                        <input type="date" placeholder="DATE" class="form-control3 @error('tgl_kembali') is-invalid @enderror"
                                        name="tgl_kembali">
                                        @error('tgl_kembali')
                                         <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <div class="btn btn-primary">
                                    <input type="submit" class="proces" value="Rental ">
                                    <span class="fas fa-arrow-right ps-2"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
