@extends('layout.app')
@extends('layout.footer')
@section('title', 'Profile')
@section('content')

{{-- Navbar --}}
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ url('user') }}">
      <img src="{{ asset('frontend/images/Feroz-Oxy.png') }}" alt="feroz-oxy" />
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
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

{{-- Content --}}
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="card text-white">
        <img src="{{ asset('frontend/images/image_2.jpg') }}" class="card-img" alt="image_2">
        <div class="card-img-overlay">
          <img src="{{ asset('frontend/images/Ferozz.png') }}" class="p-5" width="320" alt="Ferozz">
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4  position-relative overflow-hidden">
    <div class="col-md-6">
      <div class="card content-testimoni">
        <div class="card-body">
          <h4 class="card-title text-center text-white font-weight-bold">About Us</h4>
          <p class="card-text text-center text-white">Feroz Oxy merupakan Depot Air Minum Isi Ulang (DAMUI) yang berdiri pada tahun 2014. Awal terbentuk Feroz-Oxy ini karena Air Minum menjadi kebutuhan sehari-hari bagi semua orang. Maka dari situ dibuatlah sebuah Usaha Depot Air Minum Isi Ulang (DAMUI).</p>
        </div>
      </div>
    </div>

    <div class="col-md-6 testimoni_gambars"></div>
  </div>
</div>
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
