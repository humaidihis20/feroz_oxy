@extends('layout.app')
@extends('layout.footer')
@section('title', 'Konfirmasi Pembayaran')
@section('content')

{{-- Navbar --}}
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ 'user' }}">
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
      <div class="background_konfirmasi p-4"></div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg">
      <div class="card_konfirmasi">
        <div class="head-konfirmasi pt-3 pl-4">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
          <h3>Perhatian!</h3>
          <p>Periksa data pemesanan terlebih dahulu sebelum melanjutkan ke pembayaran</p>
        </div>
        <div class="pl-4">
         
            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">Nama Lengkap</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary name">{{ $pesanair->name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">Email</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary email">{{ $pesanair->email }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">No.Handphone/WA</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary nomer">{{ $pesanair->no_hp }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">Jumlah Pesanan</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary jumlah_pesanans">{{ $pesanair->jumlah_pesanair }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">Pengiriman Pada Tanggal</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary tanggal_pesanan">{{ $pesanair->tanggal }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold" style="color: #48DEFF;">Alamat Lengkap</label>
                </div>
                <div class="col-md-6">
                    <p class="text-secondary alamat_lengkaps">{{ $pesanair->alamat }}</p>
                </div>
            </div>

            <div>
                <a href="javascript:void(0)" data-id="{{ $pesanair->id }}" data-toggle="tooltip" class="btn edit-data-pembayaran mb-4 modal-edit">Edit Data</a>
            </div>

        </div>
      </div>

      <div class="note_pesanan mt-3">
        <p>*Note : Bila ada kesalahan data diatas, bisa klik tombol "Edit Data". Jika sudah benar, silahkan konfirmasi pembayaran</p>
      </div>
    </div>

    <div class="col-lg">
      <div class="card_konfirmasi_1">
        <div class="head-konfirmasi pt-3 pl-4">
          <h3>Checkout Informations</h3>
        </div>
        <div class="pl-4 pr-1">
            <table class="table table-borderless">

              <tr>
                <td style="color: #48DEFF;">Jumlah pesanan</td>
                <td></td>
                <td class="jml">{{ $pesanair->jumlah_pesanair }}</td>
              </tr>

              <tr>
                <td style="color: #48DEFF;">Harga Per Galon</td>
                <td></td>
                <td class="galon_air">Rp. {{ number_format((float)$pesanair->harga_galon, 0, '', '.') }}</td>
              </tr>

              <tr>
                <td style="color: #48DEFF;">Biaya Pengantar</td>
                <td></td>
                <td class="biaya_pengantar">Rp. {{ number_format((float)$pesanair->biaya_pengantar_galon, 0, '', '.') }}</td>
              </tr>

              <tr>
                <td style="color: #48DEFF;">Total Pembayaran</td>
                <td></td>
                <td class="total_pmbyrn">Rp. {{ number_format((float)$pesanair->total, 0, '', '.') }}</td>
              </tr>
            </table>

            <hr class="mr-4">

            <div class="pembayaran">
              <h4>Pembayaran</h4>
              <p>Sebelum mengkonfirmasi pembayaran, silahkan melakukan pembayaran terlebih dahulu</p>
            </div>

{{-- Konfirmasi Pembayaran --}}
    <div class="form-group">
    <form action="{{ url('konfirmasi_pembayaran') }}" method="POST">
        @csrf
        <input type="hidden" name="users_id" id="users_id" value="{{ $id_users }}">
        <input class="form-control" type="hidden" name="pesan_air_id" id="pesan_air_id" value="{{ $pesanair->id }}">
        <label for="metode_pembayaran"> Pilih Metode Pembayaran :</label> <br>
        <div class="form-check form-check-inline">
            <label for="metode_pembayaran">
              @error('metode_pembayaran')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <input class="@error('metode_pembayaran') is-invalid @enderror" type="radio" name="metode_pembayaran" value="Transfer" id="metode_pembayaran"> Transfer
            </label>
        </div>

        <div class="form-check form-check-inline">
            <label for="metode_pembayaran">
                <input class="@error('metode_pembayaran') is-invalid @enderror" type="radio" name="metode_pembayaran" value="Bayar ditempat" id="metode_pembayaran"> Bayar Ditempat
            </label>
        </div>
    </div>
        </div>

        <div class="row konfirmasis mt-2">
            <div class="col-md-12">
            <button type="submit" class="btn btn_konfirmasi_pembayaran">Konfirmasi Pembayaran</button>
            </div>
        </div>

        <div class="row konfirmasis">
            <div class="col-md-12">
            <a href="{{ url('pesan_air_minum') }}" class="btn btn_batal_pembayaran">Batal Pembayaran</a>
            </div>
        </div>
    </form>
{{-- End Konfirmasi Pembayaran --}}
      </div>
    </div>
  </div>
</div>
{{-- End Content --}}

{{-- Edit Data Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitles" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitles">Edit Pesan Air Minum</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
          <form id="formpembayaran" name="formpembayaran" class="form-horizontal">
            @csrf
            {{-- {{ csrf_field() }} --}}
              <div class="form-group">
                <input type="hidden" name="id" id="id">
                {{-- <input type="hidden" name="users_id" id="users_id">
                <input type="hidden" name="kode_pelanggan" id="kode_pelanggan"> --}}
                <label>Nama</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-user-cog"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name">
                </div>
              </div>

              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-envelope"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Email" name="email" id="email">
                </div>
              </div>

              <div class="form-group">
                <label>No.Handphone/WA</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-phone-square-alt"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan No.Handphone/WA" name="no_hp" id="no_hp">
                </div>
              </div>

              <div class="form-group">
                <label>Jumlah Pesanan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-prescription-bottle"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Pesan Air" name="jumlah_pesanair" id="jumlah_pesanair">
                </div>
              </div>

              <div class="form-group">
                <label>Pengiriman Pada Tanggal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user-tag"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal" name="tanggal" id="tanggal">
                </div>
              </div>

              <div class="form-group">
                <label>Alamat Lengkap</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" id="alamat">
                </div>
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
{{-- End Edit Data Modal --}}
<div class="mb-5"></div>

{{-- Script Edit Modal Pesanan --}}
<script>
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.modal-edit', function () {
        $('#formpembayaran').trigger("reset");
        var id = $(this).data('id');
        $.get("{{ url('pembayaranedit') }}" + '/' + id, function (data) {
            $('#exampleModalCenterTitles').html("Edit Pesan Air Minum");
            $('#saveBtn').val("edit-pembayaran");
            $('#saveBtn').html("Edit Data");
            $('#exampleModalCenter').modal('show');
            $('#id').val(data.id);
            $('#users_id').val(data.users_id);
            $('#kode_pelanggan').val(data.kode_pelanggan);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#no_hp').val(data.no_hp);
            $('#jumlah_pesanair').val(data.jumlah_pesanair);
            $('#tanggal').val(data.tanggal);
            $('#alamat').val(data.alamat);
        })
    });

    $('#saveBtn').click(function (e) {
    e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: new FormData($("#formpembayaran")[0]),
            url: "{{url('pembayaran')}} ",
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {

                $('#formpembayaran').trigger("reset");
                $('#saveBtn').html('Simpan Data');
                $('#exampleModalCenter').modal('hide');
                swal({position: 'top-end', title: "Success", text: "Data Berhasil Di Update!!", icon: "success", button: "OK",}).then(function(){
                location.reload();
                }
                );
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
});
</script>
{{-- End Script Edit Data Modal --}}

@endsection
