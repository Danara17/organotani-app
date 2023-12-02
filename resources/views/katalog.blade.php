<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organotani | Katalog</title>

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

   <!-- Content -->
   <div class="container">
    <div class="d-flex justify-content-end mt-5">
      <!-- Search Bar -->
      <div class="input-group mb-3 w-25">
        <input
          type="text"
          class="form-control"
          placeholder="Cari..."
          aria-label="Search"
          aria-describedby="basic-addon2" />
        <button
          class="btn btn-outline-success-2"
          type="button"
          id="button-addon2">
          Cari
        </button>
      </div>
      <!-- End Search Bar -->
    </div>

    <!-- Product -->
    <div class="row">

    @foreach ($product as $item)
    <!-- card -->
    <div class="col-lg-4 col-md-6 mb-4 mt-3">
      <div class="card shadow shadow-lg border-3" style="height: 100%; border-radius: 10px; border: 1px solid #e5e5e5;">
        <img
          src="{{ asset('product/' . $item->gambarproduct) }}"
          class="card-img-top"
          alt="Beras Organik"
          style="width: 100%; height: 50%; border-top-left-radius: 10px; border-top-right-radius: 10px;" />
        <div class="card-body d-flex justify-content-between flex-column">
          <div class="text-wrapper">
            <h5 class="card-title" style="font-weight: 700">
              {{$item->namaproduct}}
            </h5>
            <p class="card-text">
              {{$item->deskripsiproduct}}
            </p>
          </div>
          <div class="d-flex justify-content-between mt-2">
            <p class="align-middle harga-buy m-0">
              Rp. {{ number_format($item->hargaproduct,0,',','.') }} 
            </p>
            <a href="/katalog/{{$item->id}}" class="button-buy" style="border: 1px solid #007bff; border-radius: 5px; padding: 5px 10px; text-decoration: none; color: #007bff;">Beli Sekarang</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- End card -->
    @endforeach
      

    
    </div>
  </div>
  <!-- Content -->

    
  <style>
    .bg-footer{
        background-color: #4D4C7D !important; 
    }
  </style>

      <!-- Footer -->
      

    <footer class="w-100 py-4 flex-shrink-0 bg-footer mt-5">
        <div class="container py-4">
          <div class="row gy-4 gx-5">
            <div class="col-lg-4 col-md-6">
              <span class="d-flex flex-row">
                <h5 class="h1"  style="color: #f8f8ff">Organotani</h5>
                <img
                  src="{{asset('asset/organotanilogo.png')}}"
                  alt="logo organotani"
                  width="50px"
                  height="50px"
                  class="ms-2" />
              </span>
  
              <p class="small " style="color: #f8f8ff">
                Organotani adalah platform layanan pertanian organik yang berbasis teknologi modern
              </p>
              <p class="small mb-0 "  style="color: #f8f8ff">
                &copy; Copyrights. All rights reserved.
                <a
                  class="text-decoration-none"
                  href="organotani.com"
                  style="color: #f8f8ff"
                  >organotani.com</a
                >
              </p>
            </div>
            <div class="col-lg-2 col-md-6">
              <h5 class="mb-3"  style="color: #f8f8ff">Quick Links</h5>
              <ul class="list-unstyled text-muted">
                <li>
                  <a href="{{route('home')}}" class="text-decoration-none footer-link-prim"
                    >Beranda</a
                  >
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim"
                    >Katalog</a
                  >
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim"
                    >Edukasi</a
                  >
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim"
                    >Tentang</a
                  >
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim"
                    >Login</a
                  >
                </li>
              </ul>
            </div>
  
            <div class="col-lg-2 col-md-6">
              <h5 class="mb-3" style="color: #f8f8ff;">Essential Links</h5>
              <ul class="list-unstyled text-muted">
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim"
                    >Kebijakan Privasi</a
                  >
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim">
                    Syarat dan Ketentuan
                  </a>
                </li>
                <li>
                  <a href="#" class="text-decoration-none footer-link-prim">
                    FAQ
                  </a>
                </li>
              </ul>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <h5 class="mb-3" style="color: #f8f8ff;">Social Media</h5>
              <p class="small sos">
                <a href="" class="">
                  <i class="fa fa-youtube"></i>
                </a>
                <a href="" class="">
                  <i class="fa fa-instagram"></i>
                </a>
                <a href="" class="">
                  <i class="fa fa-linkedin"></i>
                </a>
              </p>
            </div>
          </div>
        </div>
      </footer>
    <!-- End Footer -->


    <!-- CDN JS CSS -->
    <script
      src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>
</html>
