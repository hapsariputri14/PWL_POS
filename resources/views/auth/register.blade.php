<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registrasi User Baru</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>PWL</b>POS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrasi User Baru</p>
      
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
      <form action="{{ url('register') }}" method="POST" id="form-register">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <small id="error-username" class="error-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <small id="error-nama" class="error-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
          <select id="level_id" name="level_id" class="form-control">
            <option value="">-- Pilih Level --</option>
            @foreach($levels as $level)
            <option value="{{ $level->level_id }}" {{ old('level_id') == $level->level_id ? 'selected' : '' }}>{{ $level->level_nama }}</option>
            @endforeach
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-layer-group"></span>
            </div>
          </div>
          <small id="error-level_id" class="error-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <small id="error-password" class="error-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <small id="error-password_confirmation" class="error-text text-danger"></small>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="{{ url('login') }}" class="text-center">Sudah punya akun? Login</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {
    $("#form-register").validate({
      rules: {
        username: {required: true, minlength: 4, maxlength: 20},
        nama: {required: true, minlength: 4, maxlength: 100},
        level_id: {required: true},
        password: {required: true, minlength: 6, maxlength: 20},
        password_confirmation: {required: true, equalTo: "#password"}
      },
      messages: {
        username: {
          required: "Username harus diisi",
          minlength: "Username minimal 4 karakter",
          maxlength: "Username maksimal 20 karakter"
        },
        nama: {
          required: "Nama harus diisi",
          minlength: "Nama minimal 4 karakter",
          maxlength: "Nama maksimal 100 karakter"
        },
        level_id: {
          required: "Level harus dipilih"
        },
        password: {
          required: "Password harus diisi",
          minlength: "Password minimal 6 karakter",
          maxlength: "Password maksimal 20 karakter"
        },
        password_confirmation: {
          required: "Konfirmasi password harus diisi",
          equalTo: "Konfirmasi password tidak sama dengan password"
        }
      },
      submitHandler: function(form) {
        $.ajax({
          url: form.action,
          type: form.method,
          data: $(form).serialize(),
          success: function(response) {
            if(response.status) { // jika sukses
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.message,
              }).then(function() {
                window.location = response.redirect;
              });
            } else { // jika error
              $('.error-text').text('');
              if(response.msgField) {
                $.each(response.msgField, function(prefix, val) {
                  $('#error-'+prefix).text(val[0]);
                });
              }
              Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: response.message
              });
            }
          },
          error: function(xhr) {
            Swal.fire({
              icon: 'error',
              title: 'Terjadi Kesalahan',
              text: 'Terjadi kesalahan pada server'
            });
          }
        });
        return false;
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
</body>
</html>
