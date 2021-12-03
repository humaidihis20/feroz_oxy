@extends('layout.app')
@extends('layout.footer')
@section('title', 'Detail Pesanan')
@section('content')

{{-- Navbar --}}
<div class="container">
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
<div class="container" id="cetak">
    <div class="row">
      <div class="col-lg">
        <div class="card_detail">
          <div class="head-konfirmasi pt-3 pl-4">
              @if (Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
              @endif
            <h3>Data Pelanggan</h3>
          </div>
          <div class="pl-4 mt-5">

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">Nama Lengkap</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary name">{{ $detail_pesanan->name }}</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">Email</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary email">{{ $detail_pesanan->email }}</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">No.Handphone/WA</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary nomer">{{ $detail_pesanan->no_hp }}</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">Jumlah Pesanan</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary jumlah_pesanans">{{ $detail_pesanan->jumlah_pesanair }}</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">Pengiriman Pada Tanggal</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary tanggal_pesanan">{{ $detail_pesanan->tanggal }}</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <label class="font-weight-bold" style="color: #48DEFF;">Alamat Lengkap</label>
                  </div>
                  <div class="col-md-6">
                      <p class="text-secondary alamat_lengkaps">{{ $detail_pesanan->alamat }}</p>
                  </div>
              </div>

              <hr class="mr-4">

              <div class="metode_pembayarans mb-2">
                  <h4 style="color: #48DEFF;">Metode Pembayaran</h4>
                  @if ($detail_pesanan->metode_pembayaran === 'Transfer')
                    <span class="font-weight-bold">{{ $detail_pesanan->metode_pembayaran }}</span>
                    <p class="text-secondary mt-4">Silahkan melakukan transfer dengan pilihan yang tertera dibawah</p>
                    <div class="row">
                        <div class="col-md">
                            <div class="row pl-2">
                                <div class="col-lg dana_title">
                                  <img src="{{ asset('frontend/images/Logo Dana.png') }}" alt="Dana" class="float-left mt-2" width="70">
                                  <ul>
                                    <li>PT. Feroz Oxy</li>
                                    <li>0881 8829 8889</li>
                                    <li>Dana</li>
                                  </ul>
                                </div>
                              </div>
                        </div>

                        <div class="col-md mr-4">
                            <div class="row pl-2">
                                <div class="col-lg bank_bni_title">
                                  <img src="{{ asset('frontend/images/BNI.png') }}" alt="Bank BNI" class="float-left" width="65">
                                  <ul>
                                    <li>PT. Feroz Oxy</li>
                                    <li>0889 8501 7888</li>
                                    <li>Bank BNI</li>
                                  </ul>
                              </div>
                            </div>
                        </div>
                    </div>
                  @else
                    <span class="text-secondary font-weight-bold">{{ $detail_pesanan->metode_pembayaran }}</span>
                  @endif
              </div>

              <div class="row">
                <div class="col-md-6">
                    <label class="" style="color: #48DEFF;">Status Pembayaran</label>
                </div>
                <div class="col-md-6">
                <p class=" font-weight-bold alamat_lengkaps" style="color: #48DEFF;">{{$detail_pesanan->status}}</p>
                </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg">
        <div class="card_detail_1">
          <div class="head-konfirmasi pt-3 pl-4">
            <h3>Detail Pesanan</h3>
          </div>
            <div class="pl-4 pr-1 mt-3">
                <table class="table table-borderless">

                    <tr>
                        <td style="color: #48DEFF;">Jumlah pesanan</td>
                        <td></td>
                        <td class="jml">{{ $detail_pesanan->jumlah_pesanair }}</td>
                    </tr>
                    <tr>
                        <td style="color: #48DEFF;">Harga Per Galon</td>
                        <td></td>
                        <td class="galon_air">Rp. {{ number_format((float)$detail_pesanan->harga_galon, 0, '', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="color: #48DEFF;">Biaya Pengantar</td>
                        <td></td>
                        <td class="biaya_pengantar">Rp. {{ number_format((float)$detail_pesanan->biaya_pengantar_galon, 0, '', '.') }}</td>
                    </tr>
                    <tr>
                    <td style="color: #48DEFF;">Total Pembayaran</td>
                        <td></td>
                        <td class="total_pmbyrn">Rp. {{ number_format((float)$detail_pesanan->total, 0, '', '.') }}</td>
                    </tr>

                </table>

                <hr class="mr-4 ml-2 total_pembayaran_border">

                <div class="note_detail">
                    <p class="text-secondary">*Note : Hubungi kontak admin untuk konfirmasi pembayaran</p>

                <table class="table table-borderless" style="position: relative; top: -15px">

                    <tr>
                        <td><h5 class="text-secondary" style="position: relative; top: 15px">Admin</h5></td>
                    </tr>

                    <tr>
                        <td class="text-secondary">No.WhatsApp</td>
                        <td></td>
                        <td style="color: #48DEFF;">+628571133521</td>
                    </tr>

                </table>
                </div>
            </div>
        </div>

        <div class="btn-group float-right mt-3" role="group" aria-label="Basic example">
          <button onclick="printContent('cetak')" class="print mr-3 text-decoration-none"><i class="far fa-file-alt mr-1"></i>Cetak Pdf</button>
          <a href="{{ url('user') }}" class="kembali">Kembali</a>
        </div>
      
      </div>
    </div>
  </div>

<div class="mb-5"></div>
{{-- End Content --}}

<script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

@endsection
