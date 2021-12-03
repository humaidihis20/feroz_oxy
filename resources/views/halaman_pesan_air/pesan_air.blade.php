@extends('layout.app')
@extends('layout.footer')
@section('title', 'Pesan Air Minum')
@section('content')

{{--Navbar --}}
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ 'user' }}">
      <img src="frontend/images/Feroz-Oxy.png" alt="" />
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="{{ Request::is('user') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link" href="{{ url('user') }}">Home</a>
        </li>
        <li class="{{ Request::is('profile_home') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link" href="{{ url('profile_home') }}">Profile</a>
        </li>
        <li class="{{ Request::is('testimonial_home') ? 'active' : '' }} nav-item mx-md-2">
          <a class="nav-link" href="{{ url('testimonial_home') }}">Testimoni</a>
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
<div class="container">
  <div class="row">
    <div class="col-12">
        <div class="background-pesanair p-4"></div>
    </div>
  </div>

  <div class="row d-flex justify-content-center">
    <div class="col-sm-10">
      <div class="head-pesanan">
        <div class="head-air-minum text-center pt-4">
          <h4>Pesan Air Minum</h4>
        </div>
        <form method="POST" action="{{ url('tambah/checkout') }}">
          @csrf

          <div class="p-3">
            <input class="form-control" type="hidden" value="{{ $users_id->id }}"  name="users_id" id="users_id">
            <input class="form-control" type="hidden" value="{{ $id_pelanggan }}"  name="kode_pelanggan" id="kode_pelanggan">
            <div class="form-group groups row mb-3">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Nama Lengkap</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" name="name" autocomplete="off" value="{{ old('name') }}" required>
                @error('name')
                <div class="alert alert-danger mt-1" style="border-radius: 20px; width: 80%;">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Email</label>
              <div class="col-sm-12 col-md-7 groups">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                @error('email')
                <div class="alert alert-danger mt-1" style="border-radius: 20px; width: 80%;">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">No.Handphone</label>
              <div class="col-sm-12 col-md-7 groups">
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan No.Handphone" name="no_hp" value="{{ old('no_hp') }}" autocomplete="off" required>
                @error('no_hp')
                <div class="alert alert-danger mt-1" style="border-radius: 20px; width: 80%;">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Jumlah Pesan Air</label>
              <div class="col-sm-12 col-md-7 groups">
                <input type="text" class="form-control @error('jumlah_pesanair') is-invalid @enderror" placeholder="Masukkan Jumlah Pesan Air" id="jumlah_pesanair" name="jumlah_pesanair" value="{{ old('jumlah_pesanair') }}" autocomplete="off" required>
                @error('jumlah_pesanair')
                <div class="alert alert-danger mt-1" style="border-radius: 20px; width: 80%;">{{ $message }}</div>
                @enderror
                <div class="contoh_pesanan ml-2 mt-1"><span class="text-secondary">*Contoh: 1 Galon</span></div>
              </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4" style="color: #48DEFF; font-weight: bold;">Dikirim pada:</label>
          </div>

          <div class="form-group row mb-3">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Hari dan Tanggal</label>
            <div class="col-sm-12 col-md-7 groups">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="far far-fw fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input type="text" id="tanggal" name="tanggal" class="form-control datepicker @error('tanggal') is-invalid @enderror" placeholder="Masukkan Tanggal" autocomplete="off" value="{{ old('tanggal') }}" required>
                    {{-- @error('tanggal')
                      <div class="invalid-feedback"> {{$message}}</div>
                    @enderror --}}
                </div>
            </div>
          </div>

          {{-- <div class="form-group row mb-3">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Hari dan Tanggal</label>
                <div class="input-group col-sm-12 col-md-7 groups">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-calendar-alt"></i></span>
                  <input type="text" id="tanggal" name="tanggal" class="form-control datepicker @error('tanggal') is-invalid @enderror" placeholder="Masukkan Tanggal" autocomplete="off" value="{{ old('tanggal') }}">
                  @error('tanggal')
                  <div class="invalid-feedback"> {{$message}}
                            </div>
                  @enderror
              </div>    
          </div> --}}

          <div class="form-group row mb-1">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Alamat Lengkap</label>
              <div class="col-sm-12 col-md-7 groups">
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Lengkap" name="alamat" value="{{ old('alamat') }}" autocomplete="off" required>
                @error('alamat')
                <div class="alert alert-danger mt-1" style="border-radius: 20px; width: 80%;">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-group row mb-4 justify-content-center">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7 checkout">
              <button class="btn" type="submit">Checkout</button>
              <a href="{{ url('user') }} " class="btn mx-1">Batal</a>
            </div>
          </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>

<div class="mb-5"></div>
{{-- End Content --}}

@endsection
