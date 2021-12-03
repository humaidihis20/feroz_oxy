@extends('layout.app')
@extends('layout.navbar')
@extends('layout.footer')
@section('title', $artikels->judul_artikel)
@section('content')

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
                <img width="400" height="400" src="{{ asset('file/'. $artikels->upload_gambar) }}" />
                {{-- <div class="xzoom-thumbs">
                  <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
                  <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
                  <a href="{{ asset('file/'. $artikels->upload_gambar) }}"><img class="xzoom-gallery" width="128" src="{{ asset('file/'. $artikels->upload_gambar) }}" xpreview="{{ asset('file/'. $artikels->upload_gambar) }}" /></a>
                </div> --}}
              </div>        
              <p class="card-text text-justify">
                {!! $artikels->konten !!}
              </p>
              <a href="{{ url('/') }}" class="btn float-right text-white" style="background-color: #48DEFF;">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

{{-- End Artikels --}}
@endsection