@extends('layout.app')
@extends('layout.footer')
@section('title', 'FerozOxy')
@section('content')

{{-- Navbar --}}
<div class="container fixed-top">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ url('user') }}">
      <img src="frontend/images/Feroz-Oxy.png" alt="" />
    </a>
    <button
      class="navbar-toggler navbar-toggler-right"
      type="button"
      data-toggle="collapse"
      data-target="#navb"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="{{ Request::is('user') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link underlines font-weight-bolder" href="{{ url('user') }}">Home</a>
        </li>
        <li class="{{ Request::is('profile_home') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link underlines font-weight-bolder" href="{{ url('profile_home') }}">Profile</a>
        </li>
        <li class="{{ Request::is('testimonial_home') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link underlines font-weight-bolder" href="{{ url('testimonial_home') }}">Testimoni</a>
        </li>
      </ul>

      <!-- Mobile button -->
      @guest
      @if ( Route::has('login') )
      <div>
        <ul class="navbar-nav">
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="{{ url('register') }}">Daftar</a>
          </li>
          <li class="d-sm-block d-md-none">
            <a href="{{ url('login') }}" class="btn btn-login my-2 my-sm-0">
              Masuk
            </a>
          </li>
          <!-- Desktop Button -->
          <li class="my-2 my-lg-0 d-none d-md-block">
            <a href="{{ url('login') }}" class="btn btn-login my-2 my-sm-0">
              Masuk
            </a>
          </li>
        </ul>
      </div>
      @endif

        @else

        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('frontend/images/Benefits.jpg') }}" class="rounded-circle" width="40" height="30">
            <div class="d-sm-none d-lg-inline-block"><span class="text-secondary" style="font-size: 18px">{{ Auth::user()->name }}</span></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="{{ url('profile_user/show', auth()->user()) }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              @if($btn == true)
              <a href="{{ url('detail_pesanan') }}" class="dropdown-item has-icon">
                <i class="fas fa-shopping-cart"></i> Detail Pesanan
              </a>
              @endif
              <div class="dropdown-divider"></div>
              <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>

      @endguest
    </div>
  </nav>
</div>
{{-- End Navbar --}}

{{-- Header --}}
<header class="text-center">
  <h1 class="hMuncul">
    Air Mineral Dapat
    <br />
    Menyegarkan Harimu
  </h1>
  <a href="{{ url('pesan_air_minum') }}" class="btn btn-get-started px-4 mt-4">
    Pesan Disini
  </a>
</header>
{{-- End Header --}}

{{-- Content --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 info-panel">
      <div class="row">
        <div class="col-lg">
          <img src="{{ asset('frontend/images/Icon Lokasi.PNG') }}" class="float-right" alt="Icon Lokasi">
          <h5>LOKASI</h5>
          <p>3 Kota</p>
        </div>
        <div class="col-lg">
          <img src="{{ asset('frontend/images/Customer.PNG') }}" class="float-right" alt="Customer">
          <h5>PELANGGAN</h5>
          <p>{{ $tampil_pelanggan }} Pelanggan</p>
        </div>
        <div class="col-lg">
          <img src="{{ asset('frontend/images/Agen.PNG') }}" class="float-right" alt="Agen">
          <h5>AGEN</h5>
          <p>5 Agen</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section-popular" id="popular">
  <div class="container">
    <div class="row">
      <div class="col text-center section-popular-heading">
        <h2>Tahukah Kamu?</h2>
        <p>
          Fakta mengenai air mineral yang kita
          <br />
          konsumsi setiap saat,mau tau apa saja?
          <br />
          Berikut kumpulan artikelnya
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section-popular-content" id="popularContent">
  <div class="container">
    <div class="swiper mySwiper review-slider">
      <div class="swiper-wrapper wrapper">
        @foreach ($artikels as $item)
          <div class="swiper-slide">
              <div class="box">
                <img src="{{asset('file/'.$item->upload_gambar)}}" class="card-img" alt="">
                <div class="content">
                  <h4>{{$item->judul_artikel}}</h4>
                  <a href="artikels/{{ $item->slug }}" class="btn btn-travel-details px-4">
                    View Details
                  </a>
                </div>
              </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>
</section>

<section class="section-networks" id="networks">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 style="color: #48DEFF ;">Mengapa Harus
          Memilih Feroz Oxy?</h2>
        <p class="text-justify">
          Karena, air mineral dari Feroz Oxy mengandung
          mineral sesuai dengan kebutuhan tubuh kita.
          Selain itu, air mineral pada Feroz Oxy juga
          menggunakan proses filterisasi dengan sebutan
          Reverse Osmosis(RO). Tujuaannya supaya dapat
          menyaring berbagai molekul besar dan ion-ion
          dari suatu larutan dengan cara memberi
          tekanan pada larutan ketika larutan itu berada
          di salah satu sisi membran  seleksi.
          Jadi sudah pasti terjamin higienis air mineralnya.
        </p>
      </div>
      <div class="col-md-6 gambar-vector">
        <img src="{{ asset('frontend/images/Section 1.png') }}" width="500">
      </div>
    </div>
  </div>
</section>

<section class="section-networks-2" id="networks">
  <div class="container">
    <div class="row">
      <div class="col-md-6 gambar-vector">
        <img src="{{ asset('frontend/images/Benefit.jpg') }}"width="500">
      </div>
      <div class="col-md-6">
        <h2 style="color: #48DEFF ;">Apa Saja Yang Bisa Kami Berikan Kepada Konsumen?</h2>
          <ul>
            <li class="list-nomor mt-5 text-justify">
              <span class="mr-2">1.</span> Bisa di pesan melalui website Feroz Oxy
            </li>
            <li class="list-nomor mt-5 text-justify">
              <span class="mr-2">2.</span> Bisa di antar sampai ke tempat tujuan
            </li>
            <li class="list-nomor mt-5 text-justify">
              <span class="mr-2">3.</span> Lebih menghemat waktu
            </li>
            <li class="list-nomor mt-5 text-justify">
              <span class="mr-2">4.</span> Terjamin mutu dan kualitas air mineral
            </li>
          </ul>
      </div>
    </div>
  </div>
</section>
{{-- End Content --}}

{{-- Preloader --}}
<div class="preloader">
  <div class="loading">
    <img src="{{ asset('frontend/images/ring.gif') }}" width="100">
    <p style="font-size: 120%; font-family: Georgia, 'Times New Roman', Times, serif;">Harap Tunggu</p>
  </div>
</div>
{{-- End Preloader --}}

@endsection
