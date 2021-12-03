@extends('layout.app')
@extends('layout.footer')
@section('title', 'Testimonial')
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
          <p>5+ Agen</p>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="container mt-5">
      <div class="card card-testimoni p-5">
        <div class="row">
          <div class="col-lg-6">
            <div class="masukkan-testimoni text-justify">
              <h3 class="card-title text-white font-weight-bold">Berikan Masukkan Anda Pada Kolom Komentar Di Halaman Ini</h3>
              <p class="card-text text-white h5">Supaya kami dapat meningkatkan pelayanan untuk konsumen. Adapun masukkan dari para pelanggan untuk memperbaiki pelayanan kami ketika masih banyak kekurangan, maka dari itu masukkan anda sangat berarti buat kami</p>
            </div>
          </div>
          
          <div class="col-lg-6">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{session('success')}}
                </div>
            @endif
            <form method="POST" action="{{ url('testimonial_home/store') }}">
                @csrf
              <div class="form-group testi-input">
                @error('testimonial')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="users_id" id="users_id" value="{{ $users }}">
                <textarea class="form-control p-3 text-secondary @error('testimonial') is-invalid @enderror" name="testimonial" placeholder="Beri Masukkan Di sini ....." id="testimonial" cols="40" rows="8" value="">{{ old('testimonial') }}</textarea>
              </div>
              <button type="submit" class="btn testi-inputs">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-md-2">
        @foreach ( $testimonials as $testi )
        <div class="col-md-6 mb-4">
          <div class="card" style="background-color: lightgray;">
            <div class="card-body">
              <p class="card-text text-justify"><img src="{{ asset('frontend/images/User-testimoni.png') }}" class="rounded-circle border" width="50" alt="..."><i class="fas fa-quote-left ml-3" style="top: -10px; position: relative; font-size: 20px; color: #48DEFF;"></i>  {{ $testi->testimonial }}</p>
            </div>
          </div>
        </div>
        @endforeach

        {{-- <div class="col-md-6 mb-4">
          <div class="card" style="background-color: lightgray;">
            <div class="card-body">
              <p class="card-text text-justify"><img src="{{ asset('frontend/images/User-testimoni.png') }}" class="rounded-circle border" width="50" alt="..."><i class="fas fa-quote-left ml-3" style="top: -10px; position: relative; font-size: 20px; color: #48DEFF;"></i>  This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card" style="background-color: lightgray;">
            <div class="card-body">
              <p class="card-text text-justify"><img src="{{ asset('frontend/images/User-testimoni.png') }}" class="rounded-circle border" width="50" alt="..."><i class="fas fa-quote-left ml-3" style="top: -10px; position: relative; font-size: 20px; color: #48DEFF;"></i>  This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card" style="background-color: lightgray;">
            <div class="card-body">
              <p class="card-text text-justify"><img src="{{ asset('frontend/images/User-testimoni.png') }}" class="rounded-circle border" width="50" alt="..."><i class="fas fa-quote-left ml-3" style="top: -10px; position: relative; font-size: 20px; color: #48DEFF;"></i>  This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
{{-- End Content --}}
{{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae reprehenderit placeat voluptatibus minus necessitatibus quos dignissimos magni voluptas sapiente. --}}

{{-- Preloader --}}
<div class="preloader">
  <div class="loading">
    <img src="{{ asset('frontend/images/ring.gif') }}" width="100">
    <p style="font-size: 120%; font-family: Georgia, 'Times New Roman', Times, serif;">Harap Tunggu</p>
  </div>
</div>
{{-- End Preloader --}}

@endsection
