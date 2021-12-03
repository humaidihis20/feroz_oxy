@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container">
  <div class="row px-3">
    <div class="col-lg-10 card registered flex-row mx-auto px-0">

      <div class="card-body">
        <h3 class="card-title ml-3 my-2" style="color: #48DEFF !important;">Feroz-Oxy</h4>

          @if(session('errors'))
            <div class="alert alert-danger" role="alert">
              Something it's wrong:
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
          @endif

          @error('name')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          @error('email')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          @error('no_hp')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          @error('password')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          @error('alamat')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          <h4 class="ml-4 mt-4">
            Sign Up
            <br>
            <small style="font-size: 10px;">To see more information, please register</small>
          </h4>

        <form class="form-box px-3" method="POST" action="{{ route('register') }}">
          @csrf
            <div class="form-input">
              <span><i class="fa fa-user-circle"></i></span>
              <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
              {{-- @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror --}}
            </div>

            <div class="form-input">
              <span><i class="fas fa-envelope"></i></span>
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div class="form-input">
              <span><i class="fas fa-phone-square-alt"></i></span>
              <input id="no_hp" type="text" placeholder="Nomor Handphone/WA" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">
            </div>

            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>

            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-input">
              <span><i class="fa fa-map-marker-alt"></i></span>
              <input id="alamat" type="text" placeholder="Alamat Lengkap" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
            </div>

            {{-- <div class="form-input">
              <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                  <option selected>--Pilih Level--</option>
                  <option value="user">User</option>
              </select>
            </div> --}}
            {{-- <div class="mb-3">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input form-check-input" type="checkbox" name="remember" id="cb1" {{ old('remember') ? 'checked' : '' }}>
              <label class="custom-control-label" for="cb1">Remember me</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="forget-link float-lg-right">
                Forget Password ?
              </a>
              @endif
            </div>
          </div> --}}

          <div class="mb-3">
            <button type="submit" class="btn btn-block text-uppercase btnsm">
              <span> Sign up</span>
            </button>
          </div>

          <div class="mb-1">
            <small> Already have an account ?</small>
            {{-- <br> --}}
            <a href="{{ url('login') }}" class="register-link">
              Sign in
            </a> <span class="or">or</span> 
        
            <a href="{{ url('auth/google') }}" class="register-link">
              Sign in with Google
            </a>
          </div>

        </form>
      </div>
      <div class="img-right d-none d-md-flex"></div>
    </div>
  </div>
</div>
@endsection
