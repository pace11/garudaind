<?php
  session_start();
  include("../lib/koneksi.php");

  $username  = $_POST['username'];
  $password  = md5($_POST['password']);


  $cek       = mysqli_query($koneksi, "SELECT * FROM admin WHERE
                            username ='$username' AND password ='$password'");
  $data      = mysqli_fetch_array($cek);
  $jumlah    = mysqli_num_rows($cek);

  if ($jumlah>0)
  {
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    echo"<br /><br /><center>Login Berhasil</center>";
    echo"<br /><center>Selamat datang <strong>$username</strong></center>";
    echo"<meta http-equiv='refresh' content='1;
    url=index.php'>";
  }
  else
  {
      echo"<br /><br /><center> Gagal, Username atau password anda SALAH..!!<br>
      <b><a href='login_admin.php'>ULANGI</a></b></center>";
  }
 ?>
