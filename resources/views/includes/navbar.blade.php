<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-success py-3" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#page-top">
      <h5>
        Agung Widiya Lestari
      </h5>
    </a>
    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
      aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="navbar-collapse collapse" id="navbarResponsive" style="">
      <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="/pembiayaan-barang">Kredit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
        @endauth
      </li>
      </ul>
    </div>
  </div>
</nav>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
