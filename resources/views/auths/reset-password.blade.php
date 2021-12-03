
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #48DEFF;">
    <div class="container">
      <div class="col-md-5">
        <div class="card">
      
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
      
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
      
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
      
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Alamat Elamil">
                        @error('email')
                        <div class="alert alert-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Masukkan Password Baru">
                        @error('password')
                        <div class="alert alert-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Masukkan Konfirmasi Password Baru">
                    </div>
      
                    <button type="submit" class="btn btn-primary btn-block">RESET PASSWORD</button>
                </form>
      
            </div>
        </div>
      </div>
    </div>
</body>
</html>