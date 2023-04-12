<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ekinerja | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('images/logo.png') }}" width="100" height="130"><br>
    <a href="/"><b>E-Kinerja</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card bg-dark text-white">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk memulai sesi</p>

      @if (session()->has('success'))
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
          {{ session('success')}}
          <button type='button' class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
      @endif

      @if (session()->has('failed'))
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        {{ session('failed')}}
        <button type='button' class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
      @endif

    @if (session()->has('loginError'))
      <div class='alert alert-info alert-dismissible fade show' role='alert'>
        {{ session('loginError') }}
        <button type='button' class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
    @endif

      <form action="/dologin" method="post">
        @csrf
        <div class="input-group mb-3">
          <select class="form-control" name="nama">
            @foreach ($datapegawai as $d)
              <option value="{{$d->nama}}">{{$d->nama}}</option>
            @endforeach
          </select>
          {{-- <input type="text" class="form-control" @error('nama') is-invalid @enderror name="nama" placeholder="Nama" id="nama" autofocus required> --}}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" @error('password') is-invalid @enderror name='password' placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <br>
      <p class="mb-1">
        <a href="/">Jika tidak bisa login, silahkan hubungi IT</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
