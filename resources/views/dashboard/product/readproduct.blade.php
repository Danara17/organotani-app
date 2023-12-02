<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organotani | Read Product</title>

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
                href="#"
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
              <li><a class="dropdown-item" href="#">Pesanan Saya</a></li>
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

        <div class="d-flex justify-content-between mt-5">
            <h1>
                Organotani Product
            </h1>

            <a class="button-buy" href="{{route('createproduct')}}" class="align-middle">Add +</a>
        </div>

        <hr class="hr mb-3">

        <table class="table table-hover">
            <thead class="text-center">
              <tr>
                <th scope="col">Id Product</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stock</th>
                <th scope="col">Ops</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($product as $item)
              <tr class="text-center">
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->namaproduct}}</td>
                <td>Rp. {{number_format($item->hargaproduct,0,',','.')}}</td>
                <td>{{$item->stockproduct}}</td>
                <td>
                  <a href="/dashboard/product/edit/{{$item->id}}" class="button-buy">Edit</a>
                  <a href="/dashboard/product/destroy/{{$item->id}}" class="button-buy">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <!-- CDN JS CSS -->
    <script
      src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>
</html>
