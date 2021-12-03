@extends('layouts_admin.main')
@section('title', 'Mengelola Artikel')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mengelola Artikel</h1>

            <div class="section-header-breadcrumb">
              <a href="#" class="btn btn-primary" data-target="#exampleModalCenter" data-toggle="modal" id="create-artikels"><i class="fas fa-plus"></i> Tambah Data Artikel</a>
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
                        <h4>Artikel</h4>
                      </div>
                      <div class="card-body">
                        {{ $tampil_artikel }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        {{-- table --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Artikel</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-1">
                    <thead>                                 
                      <tr>
                        <th>#</th>
                        <th>Judul Artikel</th>
                        <th>Slug Artikel</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Konten</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $artikels as $a)
                        <tr>

                            <td>{{ $no++ }}</td>
                            <td  width="130">{{ $a->judul_artikel }}
                              <div class="table-links">
                                <a href="javascript:void(0)" class="mx-3" id="deleteartikel" data-id="{{ $a->id }}" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                  <a href="javascript:void(0)" class="modal-edit" data-id="{{ $a->id }}" data-toggle="tooltip" id="modal-edit"><i class="fas fa-edit"></i></a>
                                </div>
                            </td>
                            <td class="badge badge-warning mt-2">{{ $a->slug }}</td>
                            <td><img src="{{asset('file/'.$a->upload_gambar)  }}" width="150" height="100"/></td>
                            <td>{!! $a->konten !!}</td>
                           
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

{{-- Create Modal Artikels --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Artikels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formartikels" name="formartikels" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label class="form-label" style="font-size: 1rem;">Judul Artikel</label>
              <input type="text" class="form-control" placeholder="Judul Artikel" name="judul_artikel" id="judul_artikel">
          </div>
  
          <div class="form-group">
            <label for="konten" class="form-label" style="font-size: 1rem;">Isi Artikel</label>
              <input id="konten" type="hidden" name="konten">
              <trix-editor input="konten" name="konten"></trix-editor>
          </div>
  
          <div class="form-group">
            <label for="upload_gambar" class="form-label" style="font-size: 1rem;">Upload Gambar</label>
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Choose Image</label>
              <input type="file" class="custom-file-input" id="customFile" name="upload_gambar">
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
</div> 

<script>
document.addEventListener('trix-file-accept', function(e){
  e.preventDefault();
});
</script>

{{-- End Create Modal Artikels --}}
@endsection