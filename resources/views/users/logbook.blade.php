<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Log Book</title>
        <!-- General CSS Files --> 
        <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
        <link rel="stylesheet" href="{{asset('bundles/datatables/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{auth()->user()->getprofil() }}"
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
            <a href="{{ url('/dashboard') }}"> <img alt="image" src="{{asset('img/PBKLUBLogo.png')}}" class="header-logo" /> <span
                class="logo-name">SI-PBKLUB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown">
              <a href="{{ url('/profile') }}" class="nav-link"><i data-feather="user"></i><span>Profil</span></a>
            </li>
            <li class="dropdown active">
              <a href="{{ url('/logbook') }}" class="nav-link"><i data-feather="book"></i><span>Logbook</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ url('/logout') }}" class="nav-link"><i data-feather="log-out"></i><span>Keluar</span></a>
            </li>
          </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LOGBOOK</h4>
                    </div>
                      <div>
                        <form method="post" action="/logbook/create">
                          {{csrf_field()}}
                                <div class="form-group">
                                  <div class="input-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="custom-select" id="inputGroupSelect05" name="nama">
                                      <option selected>Pilih bahan</option>
                                      @foreach($data_logbook as $logbook)
                                      <option value="{{$logbook->id}}">{{$logbook->nama}}</option>
                                      @endforeach
                                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="number" class="form-control" placeholder="Satuan dalam ml atau mg" name="jumlah" value="isset($penggunaan_bahan->jumlah) ? $penggunaan_bahan->jumlah : null,">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="input-group-append">
                                      <input type="submit" class="btn btn-primary" value="simpan">
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                  </div>
                                </div>
                              </div>
                            </form>

                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-striped" id="table-1">
                                   <thead>
                                    <tr>
                                      <th class="text-center">#</th>
                                      <th>Nama Bahan</th>
                                      <th>Jumlah Pemakaian</th>
                                      <th>Tanggal Pemakaian</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($data_logbook2 as $logbook2)
                                    <tr>
                                      <td></td>
                                      <td>{{$logbook2->bahan->nama}}</td>
                                      <td>{{$logbook2->jumlah}} {{$logbook2->bahan->satuan}}</td>
                                      <td>{{$logbook2->created_at->format('d M Y H:i')}}</td>
                                      {{-- <!-- <td>
                                        <a href="/editlogbook/{{ $logbook->id }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Ubah"><i
                                          class="fas fa-pencil-alt"></i></a>
                                        </td> --> --}}
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            </div>
                          </div>
                       </div>
                    </section>
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
  <script src="{{asset('bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="{{asset('bundles/sweetalert/sweetalert.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/sweetalert.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('js/custom.js')}}"></script> 

</body>

</html>