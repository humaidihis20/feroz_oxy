@extends('layout.app')
@extends('layout.footer')
@section('title', 'Profile User')
@section('content')

{{-- Navbar --}}
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ url('user') }}">
      <img src="{{ asset('frontend/images/Feroz-Oxy.png') }}" alt="" />
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
              <a href="{{ url('profile_user/show', Auth::user()) }}" class="dropdown-item has-icon">
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
<div class="container" style="margin-top: 75px;">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
      <div class="cards-edit">

        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="border-radius: 20px;">
              <div class="card-body">
                <img src="{{ asset('frontend/images/user.png') }}" alt="user" width="90" height="90" class="shadow-light usersgambar">
                <form>
                  <div class="row">
                    <div class="col-6">
                        <label class="text-dark font-weight-bold">Nama Lengkap</label>
                    </div>
                    <div class="col-6">
                        <p class="text-secondary">{{ $users->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="text-dark font-weight-bold">Email</label>
                    </div>
                    <div class="col-6">
                        <p class="text-secondary">{{ $users->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="text-dark font-weight-bold">Nomor Handphone/WA</label>
                    </div>
                    <div class="col-6">
                        <p class="text-secondary">{{ $users->no_hp }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="text-dark font-weight-bold">Alamat Lengkap</label>
                    </div>
                    <div class="col-6">
                        <p class="text-secondary">{{ $users->alamat }}</p>
                    </div>
                </div>
        
                  <a href="{{ url('edit_data_user', $users->id) }}" class="btn edit_profile">Edit Data</a>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

{{-- <script>

  function initMap() {
    
    // membuat objek untuk titik koordinat
    var lombok = {lat: -8.5830695, lng: 116.3202515};
    
    // membuat objek peta
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: lombok
    });

    // mebuat konten untuk info window
    var contentString = '<h2>Hello Dunia!</h2>';

    // membuat objek info window
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      position: lombok
    });
    
    // membuat marker
    var marker = new google.maps.Marker({
      position: lombok,
      map: map,
      title: 'Pulau Lombok'
    });
    
    // event saat marker diklik
    marker.addListener('click', function() {
      // tampilkan info window di atas marker
      infowindow.open(map, marker);
    });
    
  }
</script> --}}

{{-- End Content --}}
@endsection
