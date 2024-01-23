<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/">{{config('app.name')}}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <div class="row mb-8">
            @include('admin.partials.alerts')
        </div>
      <p class="login-box-msg">Sign in to start your session</p>

      <form class="form w-100" novalidate="novalidate" id="lgn_form" method="POST"
      data-kt-redirect-url="user/validation" action="user/validation">
      {{ @csrf_field() }}
        <div class="input-group mb-3">

          <input type="text" placeholder="Email" name="email" id="email"
                                    autocomplete="off" class="form-control bg-transparent"
                                    value="{{ old('email') }}" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="fv-plugins-message-container invalid-feedback" id="email_err">
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div class="input-group mb-3">
            <input type="password" placeholder="Password" id="password" name="password"
            autocomplete="off" class="form-control bg-transparent" />

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="fv-plugins-message-container invalid-feedback" id="password_err">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div class="row">
          <div class="col-8">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> --}}
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $("#lgn_form").submit(function(e) {

            var err = false;
            var eml = $("#email").val();
            var password = $("#password").val();
            if (eml === '') {
                $('#email_err').html("Email Cannot be empty");
                err = true;
            }
            if (password === '') {
                $('#pass_2_err').html("Password Cannot be empty");
                err = true;
            }

            if (err == true) {

                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>
