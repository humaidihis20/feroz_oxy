@extends('layout.app')
@extends('layout.footer')
@section('title', 'Edit Data User')
@section('content')

{{-- Navbar --}}
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ url('user') }}">
      <img src="{{ asset('frontend/images/Feroz-Oxy.png') }}" alt="" />
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
<div class="container" style="margin-top: 65px;">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
      <div class="cards-edit">

        <div class="row">
          <div class="col-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <img src="{{ asset('frontend/images/user.png') }}" alt="" width="80" class="gambar_editdata" style="margin-top: -70px; margin-left: auto; margin-right: auto; display: block">
                @if (Session::has('success'))
                  <div class="alert alert-success mt-1">
                      {{ Session::get('success') }}
                  </div>
                @endif
                <form action="{{ url('edit_data_user/update', $users->id) }}" method="post">
                  @csrf
                  <div class="form-input mt-4">
                    <span><i class="fa fa-user-circle"></i></span>
                    <input id="name" type="text" placeholder="Nama Lengkap" class="form-control" name="name" value="{{ $users->name }}" required autocomplete="off">
                  </div>

                  <div class="form-input">
                      <span><i class="fas fa-envelope"></i></span>
                      <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ $users->email }}" required autocomplete="off">
                  </div>

                  <div class="form-input">
                      <span><i class="fas fa-phone-square-alt"></i></span>
                      <input id="no_hp" type="text" placeholder="Nomor Handphone/WA" class="form-control" name="no_hp" value="{{ $users->no_hp }}" required autocomplete="off">
                  </div>

                  <div class="form-input">
                      <span><i class="fa fa-map-marker-alt"></i></span>
                      <input id="alamat" type="text" placeholder="Alamat Lengkap" class="form-control" name="alamat" value="{{ $users->alamat }}" required autocomplete="off">
                  </div>

                  <div class="d-grid d-flex justify-content-center">
                    <button class="btn btn-logins text-uppercase fw-bold pt-2 pb-2" type="submit">Save</button>
                    <a href="{{ url('profile_user/show', $users->id) }}" class="btn btn-logins text-uppercase fw-bold pt-2 pb-2 ml-2" style="width:max-content">Kembali</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- End Content --}}

@endsection
