
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login LO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Lelang</b>Online</a>
    </div>
    <div class="card-body"> 
      <p class="login-box-msg">Login Petugas / Admin</p>
      <hr>
      <?php
        if(isset($_GET['info'])){
          if($_GET['info'] == "gagal"){ ?>
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
            Login Gagal! username dan password salah!
          </div>
        <?php }else if($_GET['info'] == 'logout'){ ?>
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Terima Kasih</h5>
            Anda Telah Berhasil Logout
          </div>
        <?php }else if($_GET['info'] == 'login'){ ?>
          <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
            Anda Harus Login Terlebih Dahulu
          </div>
          
        <?php } } ?> 

      <form action="cek_login_petugas.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="social-auth-links text-center col-12">
            <button type="submit" class="btn btn-primary btn-block">Login Admin / Petugas</button>
            <a href="index.php" class="btn btn-info btn-block">Login Masyarakat</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
