@extends('layout.app')
@extends('layout.footer')
@section('title', 'Profile')
@section('content')

{{-- Navbar --}}
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="{{ '/' }}">
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
          <li class="nav-item mx-md-2">
            <a class="nav-link active" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="{{ url('profile') }}">Profile</a>
          </li>
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="{{ url('testimonials') }}">Testimoni</a>
          </li>
        </ul>

        <!-- Mobile button -->
        @guest
        @if ( Route::has('login') )
        <div>
          <ul class="navbar-nav">
            <li class="nav-item mx-md-2">
              <a class="nav-link" href="{{ 'register' }}">Daftar</a>
            </li>
            <li class="d-sm-block d-md-none">
              <a href="{{ 'login' }}" class="btn btn-login my-2 my-sm-0">
                Masuk
              </a>
            </li>
            <!-- Desktop Button -->
            <li class="my-2 my-lg-0 d-none d-md-block">
              <a href="{{ 'login' }}" class="btn btn-login my-2 my-sm-0">
                Masuk
              </a>
            </li>
          </ul>
        </div>
        @endif

          @else

          <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('frontend/images/Benefits.jpg') }}" class="rounded-circle" width="30" height="30">
              <div class="d-sm-none d-lg-inline-block"><span class="text-secondary" style="font-size: 18px">{{ Auth::user()->name }}</span></div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ url('profile_user/show', auth()->user()) }}" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ url('detail_pesanan') }}" class="dropdown-item has-icon">
                  <i class="fas fa-shopping-cart"></i> Pesanan
                </a>
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
@endsection
