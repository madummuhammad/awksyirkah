<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  @livewireStyles
</head>

<body>
  @include('includes.navbar')
  <div class="container">
    <div class="row pt-4">
      <div class="col-md-6 offset-md-3">
        <h1>Form Pendataan</h1>
        <hr class="divider">
        <h5 class="my-4">
          Pendataan Perseorangan Agung Widiya Lestari Syirkah Muamalah
        </h5>
        <div>
          @livewire('complete-profile-form')
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  @livewireScripts
</body>

</html>
