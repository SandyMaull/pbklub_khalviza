<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('bundles/bootstrap-social/bootstrap-social.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('img/PBKLUBLogo.png')}}" />
</head>

<body>
<div class="loader"></div>
<div class="container">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                        <form method="POST" action="/postlogin" class="needs-validation" novalidate="">
                        {{@csrf_field()}}
                        @if($message = Session::get('loginfailed'))
                        <center><font color="red">Email atau password salah</font></center>
                        @endif
                        <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" tabindex="1" required autocomplete="email" autofocus placeholder="biofarmaka@gmail.com">
                                <div class="invalid-feedback">
                                    Masukkan Email
                                </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" tabindex="2" name="password" required autocomplete="current-password" placeholder="Password">
                                <div class="invalid-feedback">
                                    Masukkan Password
                                </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <div class="form-check">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" value="{{ __('Login') }}">
                                    
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
</div>
</div>
  <!-- General JS Scripts -->
  <script src="{{asset('js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('js/custom.js')}}"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
