<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Garuda | Log in</title>
  <link rel="icon" href="src/img/icon_dasar.ico" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="src/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="src/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="src/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-logo"><i class="fa fa-plane"></i> <b>GARUDA</b> INDONESIA</div>

  <div class="login-box-body">
    <p class="login-box-msg">Please Login</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="USERNAME" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="PASSWORD" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
          <span class="fa fa-sign-in"></span>
           LOGIN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

      <p align="center">GARUDA INDONESIA | <b>Ver 1.0.0</b></p>


      <?php

      if (isset($_POST['username']) && isset($_POST['password'])){
        session_start();
        include "lib/koneksi.php";

        $username  = $_POST['username'];
        $password  = $_POST['password'];


        $cek1       = mysqli_query($koneksi, "SELECT * FROM karyawan 
                                  WHERE username ='$username' AND passwd ='$password'");
        $data      = mysqli_fetch_array($cek1);
        $jumlah    = mysqli_num_rows($cek1);

        
        if ($jumlah>0)
        {
        ?>
        <div class="callout callout-success">
          <p>Login Success <i class="fa fa-check"></i></p>
        </div>

        <?php
        echo"<meta http-equiv='refresh' content='1;
        url=index.php?tampil=beranda'>";
        } else {
          $cek2       = mysqli_query($koneksi, "SELECT * FROM master_vendor 
                                  WHERE username ='$username' AND passwd ='$password'");
          $data     = mysqli_fetch_array($cek2);
          $jumlah1    = mysqli_num_rows($cek2);
          
          if ($jumlah1 > 0) { ?>
              <div class="callout callout-success">
                <p>Login Success <i class="fa fa-check"></i></p>
              </div>
              <?php 
              echo"<meta http-equiv='refresh' content='1;
              url=index.php?tampil=beranda'>";  
            } else { ?>
              <div class="callout callout-danger">
                <p>Username & Password Wrong <i class="fa fa-close"></i></p>
              </div>
            <?php } 
        }

        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['passwd'];

      }
       ?>

  </div>
  <!-- /.login-box-body -->


</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="src/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="src/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="src/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
