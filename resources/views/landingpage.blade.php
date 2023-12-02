<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organotani | Welcome</title>

    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/1a0309481a.js"
      crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="{{'asset/organotanilogo.png'}}">

    <!-- CDN BS CSS -->
    <link
      href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}" />

    <!-- Inline CSS -->
    <style></style>
  </head>
  <body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg primary navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Organotani</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active text-center"
                aria-current="page"
                href="{{route('home')}}"
                >Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="{{route('katalog')}}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="#">Edukasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="#">Tentang</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-center"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                Bahasa
              </a>
              <ul class="dropdown-menu rounded-0">
                <li>
                  <a class="dropdown-item text-center" href="#">English</a>
                </li>
                <li>
                  <a class="dropdown-item text-center" href="#">Bahasa</a>
                </li>
              </ul>
            </li>
          </ul>

          @if (Auth::check())
          <div class="dropdown">
            <button
              class="user-btn dropdown-toggle d-flex flex-row justify-content-center align-items-center"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="namebox" style="margin-right: 8px">{{auth()->user()->name}}</div>
              <img
                src="{{asset('asset/organotanilogo.png')}}"
                alt="logo"
                width="30px" />
               @if(auth()->user()->phone == 0)
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
               @endif
            </button>
            <ul class="dropdown-menu dropdown-menu rounded-0">
              <li>
                <a class="dropdown-item" href="{{route('myaccount')}}">
                Akun Saya
                </a>
             </li>
             <li><a class="dropdown-item" href="{{route('myorder')}}">Pesanan Saya</a></li>
              @if(auth()->user()->role == "admin")
              <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
              @endif
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="btn-logout" href="{{route('logout')}}">Logout</a>
              </li>
            </ul>
          </div>
          @else
          <a href="{{url('/login')}}" class="btn btn-outline-success">Login</a>
          @endif
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
      <div
        class="d-flex justify-content-center align-items-start h-mid flex-column">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col">
            <div class="text-wrapper">
              <p class="p1 m-0 text-center text-lg-start">
                sehat dengan pangan bebas kimia
              </p>
              <p class="p2 m-0 text-center text-lg-start">
                bersama petani organik indonesia
              </p>
              <p class="p3 m-0 mt-4 text-center text-lg-start">
                Organisasi tumbuh bersama
                <strong>Komunitas Organik se-Indonesia</strong>. Sehingga
                keberhasilan kami saat Produk Pertanian Organik memiliki
                <strong>Pemasaran yang Efektif</strong> serta Produk dapat
                ter-<strong>distribusi Secara Efisien</strong>
                secara B2B.
              </p>

              <div
                class="mt-5 d-flex justify-content-center justify-content-lg-start">
                <button class="button-started-landing">
                  Jelajahi dan Gabung Sekarang
                </button>
              </div>
            </div>
          </div>
          <div
            class="col d-none d-lg-flex justify-content-center align-items-center img-container">
            <img src="{{asset('asset/petani.png')}}" alt="" width="500px" style="" />
          </div>
        </div>
      </div>
    </div>

    <!-- CDN JS CSS -->
    <script
      src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>
</html>
