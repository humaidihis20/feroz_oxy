@extends('layout.app')
@extends('layout.header')
@extends('layout.navbar')
@extends('layout.footer')
@section('title', 'Testimonial')
@section('content')

{{-- Content --}}
<main>
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
          <form action="POST">
            <div class="form-group testi-input">
              <textarea class="form-control p-3 text-secondary" name="testimonial" placeholder="Beri Masukkan Di sini ....." id="testimonial" cols="40" rows="8"></textarea>
            </div>
            <a href="{{ url('login') }}" type="submit" class="btn testi-inputs">Sign in</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2">
      @foreach ( $testimonials as $t )
      <div class="col-md-6 mb-4">
        <div class="card" style="background-color: lightgray;">
          <div class="card-body">
            <p class="card-text text-justify"><img src="{{ asset('frontend/images/User-testimoni.png') }}" class="rounded-circle border" width="50" alt="..."><i class="fas fa-quote-left ml-3" style="top: -10px; position: relative; font-size: 20px; color: #48DEFF;"></i>  {{ $t->testimonial }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
{{-- End Content --}}
</main>
@endsection

