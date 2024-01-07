<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  @include('includes.navbar')
  <div class="container">
    <div class="row" style="margin-top:50px">
      <div class="col-md-6 offset-md-3">
        <h1 class="mb-3">Ganti Password</h1>
        <h6>Silahkan masukkan email anda yang terdaftar lalu masukkan password anda yang baru</h6>
        <div class="row gx-4 gx-5 justify-content-center mb-5">
          <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group my-3">
              <label for="email" class="text-success"><strong>Email</strong></label>
              <input type="email" name="email" id="email" class="form-control">
              <span class="text-danger mb-3">
                @error('email')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="form-group my-3">
              <label for="password" class="text-success"><strong>Password baru</strong></label>
              <input type="password" name="password" id="password" class="form-control">
              <span class="text-danger mb-3">
                @error('password')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="form-group my-3">
              <label for="password" class="text-success"><strong>Konfirmasi Password baru</strong></label>
              <input type="password" name="password_confirmation" id="password" class="form-control">
              <span class="text-danger mb-3">
                @error('password')
                {{ $message }}
                @enderror
              </span>
            </div>

            <button type="submit" class="btn btn-success mt-1">
              Ubah password
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>