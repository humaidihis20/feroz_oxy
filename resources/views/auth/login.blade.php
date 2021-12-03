@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
    <div class="col-lg-10 card flex-row mx-auto px-0">
      
      <div class="card-body">
        <h3 class="card-title ml-3 my-2" style="color: #48DEFF !important;">Feroz-Oxy</h4>
          
          @if (Session::has('info'))
          <div class="alert alert-info" role="alert">
            {{ Session::get('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @endif

          @if (Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
          @endif
          
          @error('name')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          @enderror
            
          @error('password')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          @enderror

        <h4 class="ml-4 mt-4">
          Login
          <br>
          <small style="font-size: 10px;">Sign in byentering the information below</small>
        </h4>
        <form class="form-box px-3" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-input">
            <span><i class="fa fa-user"></i></span>
            {{-- <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email"> --}}
            <input id="name" type="text" placeholder="Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" required>
          </div>

          <div class="form-input">
            <span><i class="fa fa-key"></i></span>
            <input id="password" type="password" placeholder="Password" class="form-password form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required>
          </div>

          <div class="form-input">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input form-check-input form-checkbox" name="show_password" id="show_password">
              <label class="custom-control-label" style="padding: 3px;" for="show_password">Show Password</label>
            </div>
          </div>

            <div class="form-input">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input form-check-input" type="checkbox" name="remember" id="remember">
                <label class="custom-control-label" style="padding: 3px;" for="remember"> {{ __('Remember Me') }}</label>
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="forget-link my-1 float-lg-right">
                    Forget Password ?
                  </a>
                  @endif
                  
              </div>
            </div>

          <div class="mb-2">
            <button type="submit" class="btn btn-block text-uppercase btnsm">
              <span> Login</span>
            </button>
          </div>

          <div class="mb-2">
            <small style="font-size: 10px"> Not Registered yet?</small>
            <a href="{{ url('register') }}" class="register-link">
              Create an account
            </a>
          </div>

          <div class="text-center text-secondary font-weight-bold">
            Or
          </div>

          <div class="row mb-2">
            <a href="{{ url('auth/google') }}" class="btns btn btn-block"><i class="fab fa-google"></i>
              Sign in with Google
            </a>
            <a href="{{ url('/') }}" class="btn btn-block text-uppercase btnsm">
              <span>Back To Home</span>
            </a>
          </div>

        </form>
      </div>
      <div class="img-right d-none d-md-flex"></div>
    </div>
  </div>
</div>
@endsection
