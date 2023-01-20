@extends('frontend.layouts.user')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('frontend/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Riwayat <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Riwayat</h1>
          </div>
        </div>
      </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Riwayat
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mobil</th>
                                        <th>Supir Pribadi</th>
                                        <th>Lama Sewa</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Total Bayar</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $no = 1;
                                    @endphp
                                    @foreach($transaksi as $data)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->mobil->nama_mobil }}</td>
                                            <td>{{ $data->supir }}</td>
                                            <td>{{ $data->lama_sewa }}</td>
                                            <td>{{ $data->tgl_sewa }}</td>
                                            <td>{{ $data->tgl_kembali }}</td>
                                            <td>Rp. {{ number_format($data->total_bayar,0,',','.') }}</td>
                                            <td class="text-center"> @if($data->status == "Process")
                                                   @php $color = "success";@endphp
                                                @elseif($data->status == "Selesai")
                                                   @php $color = "secondary";@endphp
                                                @elseif($data->status == "Dibatalkan")
                                                   @php $color = "danger";@endphp
                                                @endif
                                           <span class="bg-{{ $color }} p-1" style="border-radius: 4px">{{ $data->status }}</span>
                                                @if ($data->status == "Process")
                                                <form action="{{ route('batal', $data->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="mt-1 btn btn-sm btn-outline-danger show_confirm" data-toggle="tooltip" title='Batalkan'>
                                                        Batalkan
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection