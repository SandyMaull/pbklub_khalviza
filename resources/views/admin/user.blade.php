<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Data User</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/summernote/summernote-bs4.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('img/PBKLUBLogo.ico')}}"/>
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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{auth()->user()->getprofil()}}"
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
              <a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="package"></i><span>Bahan</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="bahan">Daftar Bahan</a></li>
                <li><a class="nav-link" href="bahanmasuk">Bahan Masuk</a></li>
              </ul>
            </li>
            <li class="dropdown active">
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
               <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar User</h4>
                    <div class="card-header-action">
                    <a href="{{ url('/formuser') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;?>
                          @foreach($data_user as $user)
                        <?php $no++ ?>
                          <tr>
                            <td><center>{{$no}}</center></td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            {{-- @if($user->role == "admin")
                              <a href="{{ url('/edituser'.'/'.$user->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Ubah"><i
                                class="fas fa-pencil-alt"></i></a>
                            @endif --}}
                            @if($user->role != "admin")
                            <a href="{{ url('/edituser'.'/'.$user->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Ubah"><i
                                class="fas fa-pencil-alt"></i></a>
                            <a href="{{ url('/user/delete/'.$user->id)}}" class="btn btn-danger btn-action sa-remove" data-toggle="tooltip" title="Hapus"
                              ><i class="fas fa-trash"></i></a>
                            @endif
                            </td>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
  <!-- JS Libraies -->
  <script src="{{asset('bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('js/custom.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/widget-data.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/datatables.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('bundles/sweetalert/sweetalert.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/sweetalert.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweetalert::alert')
  <script>
         
         $('.sa-remove').on('click', function (e) {
          event.preventDefault();
          const url = $(this).attr('href');
          swal({
              title: 'Apakah Anda yakin?',
              text: 'Data akan terhapus secara permanen',
              icon: 'warning',
              buttons: ["Tidak", "Ya!"],
          }).then(function(value) {
              if (value) {
                  window.location.href = url;
              }
          });
        });
    </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>