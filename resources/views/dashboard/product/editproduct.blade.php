<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Organotani | Edit Product</title>
        <link href="{{url('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="{{url('https://kit.fontawesome.com/1a0309481a.js')}}"crossorigin="anonymous"></script>
         <!-- Favicon -->
       <link rel="icon" href="{{'asset/organotanilogo.png'}}">

        {{-- <link rel="stylesheet" href="{{asset('style.css')}}"> --}}
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('dashboard')}}">Organotani</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
              <a href="{{route('katalog')}}" class="btn btn-outline-success rounded-0">Lihat Katalog</a>
          </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsProduct" aria-expanded="false" aria-controls="collapseLayoutsProduct">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Product
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsProduct" aria-labelledby="headingProduct" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('readproduct') }}">Manage Product</a>
                                    <a class="nav-link" href="{{ route('createproduct') }}">Add Product</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsUser" aria-expanded="false" aria-controls="collapseLayoutsUser">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsUser" aria-labelledby="headingUser" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('user')}}">Manage User</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">product</li>
                            <li class="breadcrumb-item active">edit product</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>                               
                            </div>
                            <div class="card-body">
                              <form action="{{route('updateproduct')}}" method="post" enctype="multipart/form-data">
          
                                @csrf
                              
                                <div class="d-flex justify-content-center">
                                  
                                </div>
                              
                                <div class="mb-3">
                                  <label for="namaproduct" class="form-label">Nama Product</label>
                                  <input type="text" class="form-control @error('namaproduct') is-invalid @enderror" id="namaproduct" name="namaproduct" aria-describedby="errornamaproduct" value="{{$product->namaproduct}}">
                                  @error('namaproduct')
                                      <div id="errornamaproduct" class="invalid-feedback">
                                          Harap isi <strong>nama product</strong>
                                      </div>
                                  @enderror
                                </div>
                              
                              
                                <div class="mb-3">
                                    <label for="gambarproduct" class="form-label">Gambar Product</label>
                                    <input class="form-control @error('gambarproduct') is-invalid @enderror" type="file" name="gambarproduct" id="gambarproduct" accept="image/*" aria-describedby="errorgambarproduct" value="{{ $product->gambarproduct }}">
                                    @error('gambarproduct')
                                        <div id="errorgambarproduct" class="invalid-feedback">
                                            Harap isi <strong>gambar product</strong>
                                        </div>
                                    @enderror
                                </div>
                                
                              
                                <div class="mb-3">
                                  <label for="hargaproduct" class="form-label">Harga</label>
                                  <input type="text" class="form-control @error('hargaproduct') is-invalid @enderror" id="hargaproduct"  name="hargaproduct" aria-describedby="errorhargaproduct" value="{{$product->hargaproduct}}">
                                  @error('hargaproduct')
                                  <div id="errorhargaproduct" class="invalid-feedback">
                                      Harap isi <strong>harga product</strong>
                                  </div>
                                  @enderror
                                </div>
                              
                                <div class="mb-3">
                                  <label for="deskripsiproduct" class="form-label">Deskripsi</label>
                                  <textarea name="deskripsiproduct" id="deskripsiproduct" class="form-control @error('deskripsiproduct') is-invalid @enderror" cols="10" rows="10" aria-describedby="errordeskripsiproduct">{{$product->deskripsiproduct}}</textarea>
                                  @error('deskripsiproduct')
                                      <div id="errordeskripsiproduct" class="invalid-feedback">
                                          Harap isi <strong>deskripsi product</strong>
                                      </div>
                                  @enderror
                               </div>
                              
                                
                                <div class="mb-3">
                                  <label for="stockproduct" class="form-label">Stock</label>
                                  <input type="number" class="form-control @error('stockproduct') is-invalid @enderror" id="stockproduct"  name="stockproduct" aria-describedby="errorstockproduct" value="{{$product->stockproduct}}">
                                  @error('stockproduct')
                                  <div id="errorstockproduct" class="invalid-feedback">
                                      Harap isi <strong>stock product</strong>
                                  </div>
                                  @enderror
                                </div>
                              
                                <input type="text" value="{{$product->id}}" name="id" hidden>
                              
                                <div class="d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div> 

  
        
        <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Ct.min.js')}}"har crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
