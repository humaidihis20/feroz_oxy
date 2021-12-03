<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.7.0/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  @yield('content')
  {{-- <div class="container">
      <div class="col-md-4 offset-md-4" style="margin-top: 140px">
          <div class="card">
              <div class="card-header">
                  <h3 class="text-center">Form Login</h3>
              </div>
              <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="card-body">
                  @if(session('errors'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Something it's wrong:
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                          <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                          </ul>
                      </div>
                  @endif
                  @if (Session::has('success'))
                      <div class="alert alert-success">
                          {{ Session::get('success') }}
                      </div>
                  @endif
                  @if (Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                      </div>
                  @endif
                  <div class="form-group">
                      <label for=""><strong>Email</strong></label>
                      <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Password</strong></label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Log In</button>
                  
                  <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
              </div>
              </form>
          </div>
      </div>
  </div> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/a565b10ae6.js" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 4000);
    });

    $(document).ready(function() {
      $('.form-checkbox').click(function(){
        if ($(this).is(':checked')) {
          $('.form-password').attr('type', 'text');
        } else {
          $('.form-password').attr('type', 'password');
        }
      });
    });
  </script>
</body>
</html>
