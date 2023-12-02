<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organotani | My Account</title>

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

    <div class="container mt-5">
        <form action="{{route('savepersonalinfo')}}" method="post">
        @csrf
            <input type="text" value="{{auth()->user()->id}}" name="id" hidden>
          <div class="row row-md-column mt-5">
            <div class="col-12 col-md-4">
              <div
                class="d-flex flex-column justify-content-center align-items-center">
                <img
                  src="{{asset('asset/Farmer-rafiki.png')}}"
                  alt="farmer"
                  width="150px"
                  height="150px"
                  class="rounded-circle img-thumbnail border-3" />
                <div class="small mt-3 text-secondary">Danara Dhasa Caesa</div>
                <!-- <button class="button-buy mt-2">Edit</button> -->
              </div>
            </div>
  
            <div class="col-12 col-md-8">
              <h3 class="text-center text-md-start mt-4 mt-md-0">
                Edit Personal Info
              </h3>
  
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum
                quibusdam optio totam dolor ad ducimus nisi recusandae magni
                delectus placeat at, fugiat modi perspiciatis atque quia laborum
                ipsam eaque aliquid!
              </p>
  
            @if (session('success'))
                <div class="alert alert-success rounded-0" role="alert">
                    {!! session('success') !!}
                </div>
            @endif

              <!-- Input Username -->
              <div class="mb-3 row mt-5">
                <label for="username" class="col-sm-2 col-form-label"
                  >Username</label
                >
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="input-primary"
                    id="username"
                    placeholder=""
                    value="{{auth()->user()->username}}"
                    name="username" />
                </div>
              </div>
  
              <!-- Input Nickname -->
              <div class="mb-3 row">
                <label for="nickname" class="col-sm-2 col-form-label"
                  >Nickname</label
                >
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="input-primary"
                    id="nickname"
                    placeholder=""
                    value="{{auth()->user()->name}}"
                    name="name" />
                </div>
              </div>
  
              <!-- Input Email -->
              <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input
                    type="email"
                    class="input-primary"
                    id="email"
                    placeholder=""
                    value="{{auth()->user()->email}}"
                    name="email" />
                </div>
              </div>
  
              <!-- Input Email -->
              <div class="mb-3 row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input
                    type="tel"
                    class="input-primary"
                    id="phone"
                    placeholder=""
                    value="{{auth()->user()->phone}}"
                    name="phone" />
                </div>
              </div>
  
              <!-- Input Email -->
              <div class="mb-3 row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                  <select name="gender" id="gender" class="select-primary">
                    @if(auth()->user()->gender == "male")
                    <option value="male" class="option-primary" selected>Pria</option>
                    <option value="female" class="option-primary">Wanita</option>
                    @else
                    <option value="male" class="option-primary" >Pria</option>
                    <option value="female" class="option-primary" selected>Wanita</option>
                    @endif
                    
                  </select>
                </div>
              </div>
  
              <div class="d-flex justify-content-end mt-5">
                <button type="submit" class="button-buy-static">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>


    <!-- Footer -->
      <footer class="w-100 py-4 flex-shrink-0 bg-dark mt-5">
        <div class="container py-4">
          <div class="row gy-4 gx-5">
            <div class="col-lg-4 col-md-6">
              <span class="d-flex flex-row">
                <h5 class="h1 text-white">Organotani</h5>
                <img
                  src="{{asset('asset/organotanilogo.png')}}"
                  alt="logo organotani"
                  width="50px"
                  height="50px"
                  class="ms-2" />
              </span>
  
              <p class="small text-white">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt.
              </p>
              <p class="small text-white mb-0">
                &copy; Copyrights. All rights reserved.
                <a
                  class="text-decoration-none"
                  href="organotani.com"
                  style="color: #2ec23f"
                  >organotani.com</a
                >
              </p>
            </div>
            <div class="col-lg-2 col-md-6">
              <h5 class="text-white mb-3">Quick Links</h5>
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
              <h5 class="text-white mb-3">Essential Links</h5>
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
              <h5 class="text-white mb-3">Social Media</h5>
              <p class="small text-white sos">
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
