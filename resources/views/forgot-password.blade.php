<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lupa Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  @include('includes.navbar')
  <div class="container">
    <div class="row" style="margin-top:50px">
      <div class="col-md-6 offset-md-3">
        <h1 class="mb-3">Lupa Password</h1>
        <h6 class="mt-2">
          Silahkan masukkan email anda, kami akan mengirimkan link reset password ke email anda
        </h6>
        <div class="row gx-4 gx-5 justify-content-center mb-5">
          <form action="{{ route('forget.password.post') }}" method="POST">
            @csrf
            @if (Session::has('success'))
            <div class="alert alert-success w-75 mt-2" role="alert">
              {{ Session::get('success') }}
            </div>
            @endif
            <div class="form-group my-3">
              <label for="email" class="text-success"><strong>Email</strong></label>
              <input type="email" name="email" id="email" class="form-control">
              <span class="text-danger mb-3">
                @error('email')
                {{ $message }}
                @enderror
              </span>
            </div>

            <button type="submit" class="btn btn-warning mt-1 mb-2">
              Kirim link reset password
            </button>
            <div>
                <a href="{{route('login')}}">Kembali ke halaman login</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
