@extends('layouts_admin.main')
@section('title', 'Mengelola Pesanan Air')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mengelola Pesanan Air</h1>

            <div class="section-header-breadcrumb">
              {{-- <a href="#" class="btn btn-primary" data-target="#exampleModalCenter" data-toggle="modal" id="create-pesanan"><i class="fas fa-plus"></i> Tambah Data Pesanan Air</a> --}}
            </div>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pesanan Air</h4>
                      </div>
                      <div class="card-body">
                        {{ $tampil_pesanan_air }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        {{-- table --}}
        <div class="row">
          <div class="col-lg">
            <div class="card">
              <div class="card-header">
                <h4>Data Pesanan Air</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-2">
                    <thead>                                 
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kode Pelanggan</th>
                        <th>Email</th>
                        <th>Nomor/WA</th>
                        <th>Jumlah Pesanan Air</th>
                        <th>Tanggal</th>
                        <th>Metode Pembayaran</th>
                        <th>Alamat</th>
                        <th>Status Pembayaran</th>
                        {{-- <th>Harga Galon</th>
                        <th>Biaya Pengantar</th> --}}
                        <th>Total Biaya</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $pesanan_air_minum as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->kode_pelanggan }}
                                <div class="table-links">
                                    <a href="javascript:void(0)" class="modal-edit-pesanan" data-id="{{ $p->id }}" data-toggle="tooltip" id="edit-pesanan"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="mx-3" id="delete_pesanan_air" data-id="{{ $p->id }}" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>{{ $p->jumlah_pesanair }}</td>
                            <td>{{ $p->tanggal }}</td>
                            @if ($p->metode_pembayaran === 'Transfer')
                                <td class="btn btn-sm btn-primary mt-2">{{ $p->metode_pembayaran }}</td>
                            @else
                                <td class="btn btn-sm btn-warning mt-2">{{ $p->metode_pembayaran }}</td>
                            @endif
                            <td>{{ $p->alamat }}</td>
                            <td>
                              
                              @if ($p->status=='Belum Lunas')
                              <Button class="btn btn-sm btn-danger ">Belum Lunas</Button>  
                              @else
                              <Button class="btn btn-sm btn-success ">Sudah Lunas</Button>   
                              @endif
                              
                            </td>
                            {{-- <td>Rp. {{ number_format((float)$p->harga_galon, 0, '', '.') }}</td>
                            <td>Rp. {{ number_format((float)$p->biaya_pengantar_galon, 0, '', '.') }}</td> --}}
                            <td>Rp. {{ number_format((float)$p->total, 0, '', '.') }}</td>
                            <td>
                            
                            @if ($p->status!='Sudah Lunas')
                              <a href="{{ route("confirm.pembayaran", $p->id) }}" class="btn btn-sm btn-info">Terima</a>
                              {{--  @else  --}}
                              {{--  <a href="#" class="btn btn-sm btn-outline-danger"></a>   --}}
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>

@endsection