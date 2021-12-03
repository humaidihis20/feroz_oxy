@extends('layouts_admin.main')
@section('title', 'Dashboard Admin')
@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
        <div class="section-body">
            <div class="row">
                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-donate"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pemasukan (Rp) </h4>
                      </div>
                      <div class="card-body">
                        $60
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-upload"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengeluaran (Rp) </h4>
                      </div>
                      <div class="card-body">
                        $70
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Saldo (Rp)</h4>
                      </div>
                      <div class="card-body">
                        $14
                      </div>
                    </div>
                  </div>
                </div> --}}
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>User</h4>
                      </div>
                      <div class="card-body">
                        {{ $user }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="section-body">
          <div class="card">
            <div class="card-header" style="font-size: 40px; font-weight: 700;">
              Selamat Datang, {{Auth::user()->name}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>A well-known quote, contained in a blockquote element.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
  </section>
</div>

<div class="preloader">
  <div class="loading">
    <img src="{{ asset('frontend/images/Ellips.gif') }}" width="100">
    <p style="font-size: 120%; font-family: Georgia, 'Times New Roman', Times, serif;">Harap Tunggu</p>
  </div>
</div>

@endsection