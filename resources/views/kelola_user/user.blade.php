@extends('layouts_admin.main')
@section('title', 'Mengelola Users')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mengelola Users</h1>

            <div class="section-header-breadcrumb">
              <a href="#" class="btn btn-primary" data-target="#exampleModalCenter" data-toggle="modal" id="create-user"><i class="fas fa-plus"></i> Tambah Data User</a>
            </div>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Admin</h4>
                      </div>
                      <div class="card-body">
                        {{ $tampil_admin }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>User</h4>
                      </div>
                      <div class="card-body">
                        {{ $tampil_user }}
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor/WA</th>
                        <th>Alamat</th>
                        <th>Status Login</th>
                        <th>Waktu Online</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $users as $user)
                        <tr>
                            
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}
                              <div class="table-links">
                                <a href="javascript:void(0)" class="mx-3" id="delete_user" data-id="{{ $user->id }}" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                  {{-- <a href="#" class="modal-edit-user" data-target="#edit-user" data-toggle="modal" data-id="{{ $user->id }}"><i class="fas fa-edit"></i></a> --}}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->no_hp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>
                                @if(Cache::has('user-is-online-' . $user->id))
                                    <span class="text-success">Online</span>
                                @else
                                    <span class="text-secondary">Offline</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                           
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


{{-- Create Modal User --}}

<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formuser" name="formuser" class="form-horizontal">
                <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <label class="form-label" style="font-size: 1rem;">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" id="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Nomor/WA</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Nomor/WA" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required>
                </div>
        
                <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Level</label>
                    <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                        <option value="" selected hidden>--Pilih Level--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Password</label>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  </div>
      
                  <div class="form-group">
                    <label class="form-label" style="font-size: 1rem;">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="saveUser" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</div> 

{{-- End Create Modal User --}}

{{-- <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form name="form_edituser" id="form_edituser" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" id="id">
                <label class="form-label" style="font-size: 1rem;">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label class="form-label" style="font-size: 1rem;">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" style="font-size: 1rem;">Nomor/WA</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Nomor/WA" name="no_hp" id="no_hp" required>
            </div>
    
            <div class="form-group">
                <label class="form-label" style="font-size: 1rem;">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat" id="alamat" required>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="saveEditUser" class="btn btn-primary">Update Data</button>
        </div>
        </div>
    </div>
</div> --}}
@endsection