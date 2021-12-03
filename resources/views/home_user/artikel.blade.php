@extends('layout.app')
@extends('layout.footer')
@section('title', $artikels->judul_artikel)
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

{{-- Artikels --}}

<section class="section-details-content mt-5">
  <div class="container">
    <div class="row">
      <div class="col p-0 pl-3 pl-lg-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
              Views Artikel
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{$artikels->judul_artikel}}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 pl-lg-0">
        <div class="card card-details">
          <h1>{{$artikels->judul_artikel}}</h1>
          <div class="gallery">
            <div class="xzoom-container">
              <img class="xzoom" id="xzoom-default" width="500" height="550" src="{{ asset('file/'. $artikels->upload_gambar) }}" />
              {{-- <div class="xzoom-thumbs">
                <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
                <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
                <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
              </div> --}}
            </div>        
            <p class="text-justify">
              {!! $artikels->konten !!}
            </p>
            <a href="{{ url('/') }}" class="btn_back float-right text-white">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  {{-- <section class="section-details-content mt-4">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Paket Travel
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1>Nusa Peninda</h1>
            <p>
              Republic of Indonesia Raya
            </p>
            <div class="gallery">
              <div class="xzoom-container">
                <img
                  class="xzoom"
                  id="xzoom-default"
                  src="frontend/images/details-1.jpg"
                  xoriginal="frontend/images/details-1.jpg"
                />
                <div class="xzoom-thumbs">
                  <a href="frontend/images/details-1.jpg"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="frontend/images/details-1.jpg"
                      xpreview="frontend/images/details-1.jpg"
                  /></a>
                  <a href="frontend/images/details-1.jpg"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="frontend/images/details-1.jpg"
                      xpreview="frontend/images/details-1.jpg"
                  /></a>
                  <a href="frontend/images/details-1.jpg"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="frontend/images/details-1.jpg"
                      xpreview="frontend/images/details-1.jpg"
                  /></a>
                  <a href="frontend/images/details-1.jpg"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="frontend/images/details-1.jpg"
                      xpreview="frontend/images/details-1.jpg"
                  /></a>
                  <a href="frontend/images/details-1.jpg"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="frontend/images/details-1.jpg"
                      xpreview="frontend/images/details-1.jpg"
                  /></a>
                </div>
              </div>
              <h2>Tentang Wisata</h2>
              <p>
                Nusa Penida is an island southeast of Indonesia’s island
                Bali and a district of Klungkung Regency that includes the
                neighbouring small island of Nusa Lembongan. The Badung
                Strait separates the island and Bali. The interior of Nusa
                Penida is hilly with a maximum altitude of 524 metres. It is
                drier than the nearby island of Bali.
              </p>
              <p>
                Bali and a district of Klungkung Regency that includes the
                neighbouring small island of Nusa Lembongan. The Badung
                Strait separates the island and Bali.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Members are going</h2>
            <div class="members my-2">
              <img src="frontend/images/members.png" alt="" class="w-75" />
            </div>
            <hr />
            <h2>Trip Informations</h2>
            <table class="trip-informations">
              <tr>
                <th width="50%">Date of Departure</th>
                <td width="50%" class="text-right">22 Aug, 2019</td>
              </tr>
              <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-right">4D 3N</td>
              </tr>
              <tr>
                <th width="50%">Type</th>
                <td width="50%" class="text-right">Open Trip</td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">$80,00 / person</td>
              </tr>
            </table>
          </div>
          <div class="join-container">
            <a href="checkout.html" class="btn btn-block btn-join-now mt-3 py-2"
              >Join Now</a
            >
          </div>
        </div>
      </div>
    </div>
  </section> --}}

{{-- End Artikels --}}
@endsection