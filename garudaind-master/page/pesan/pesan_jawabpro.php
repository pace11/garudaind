<?php

  include "../../lib/koneksi.php";
  
  $id = $_POST['id'];
	$jawaban = addslashes($_POST['jawaban']);

	$balas = mysqli_query($koneksi, "UPDATE pesan SET
          jawaban   = '$jawaban'
          WHERE id_pesan = $id");
	header('location:../../?tampil=pesan');

?>