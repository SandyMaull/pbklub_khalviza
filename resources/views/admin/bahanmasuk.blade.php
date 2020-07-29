<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bahan Masuk</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/jquery-selectric/selectric.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('img/PBKLUBLogo.ico')}}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
                </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right"> 
        <li class="dropdown-title"><a>{{Auth::user()->name}} </a>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('admin/images/'.auth()->user()->profil) }}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello {{Auth::user()->name}}</div>
              <a href="{{ url('/profile') }}" class="dropdown-item has-icon"> <i class="far fa-user-circle"></i> Profile</a>
              <a href="{{ url('/gantipass') }}" class="dropdown-item has-icon"> <i class="fas fa-lock"></i> Ganti Password</a>  
              <div class="dropdown-divider"></div>
              <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('img/PBKLUBLogo.png')}}" class="header-logo" /> <span
                class="logo-name">SI-PBKLUB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
          <li class="dropdown">
              <a href="{{ url('/profile') }}" class="nav-link"><i data-feather="user"></i><span>Profil</span></a>
            </li>
            <li class="dropdown">
              <a href="dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown active">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="package"></i><span>Bahan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/bahan') }}">Daftar Bahan</a></li>
                <li class="active"><a class="nav-link" href="{{ url('/bahanmasuk') }}">Bahan Masuk</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="{{ url('/user') }}" class="nav-link"><i data-feather="user"></i><span>User</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ url('/pengguna') }}" class="nav-link"><i data-feather="users"></i><span>Eksternal User</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ url('/logout') }}" class="nav-link"><i data-feather="log-out"></i><span>Keluar</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                 <div class="card">
                  <form method="post" action="/bahanmasuk/create" class="needs-validation" >
                    {{csrf_field()}}
                    <div class="card-header">
                      <h4> Data Bahan Masuk</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Bahan</label>
                        <div class="col-sm-9">
                          <select class="form-control selectric" required="" name="nama">
                            <option selected="selected"></option>
                            @foreach($data_bahan as $bahan)
                              <option value="{{$bahan->id}}">{{$bahan->nama}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Pilih bahan
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Satuan dalam ml atau mg" name="jumlah" value="isset($penggunaan_bahan->jumlah) ? $penggunaan_bahan->jumlah : null,">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   
                            </div>
                            <div class="invalid-feedback">
                              Jumlah harus dimasukkan
                            </div>
                          
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      
                        <input type="submit" class="btn btn-primary" value="Simpan"></input>
                        <a href="{{ url('/bahan') }}" class="btn btn-secondary">Batal</a>
                       
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Footer-->
      <footer class="main-footer">
        <div class="footer-left">
          <strong>Copyright &copy; 2020 <a href="http://biofarmaka.ipb.ac.id">Pusat Studi Biofarmaka Tropika IPB</a></strong>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('js/app.min.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('js/custom.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/page/datatables.js')}}"></script>
  <script src="{{asset('js/page/forms-advanced-forms.js')}}"></script>
  <script src="{{asset('bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  @include('sweetalert::alert')
  
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>