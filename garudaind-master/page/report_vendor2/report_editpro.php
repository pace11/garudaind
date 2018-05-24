<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><b>Karyawan</b> | Edit</h3>
      </div>

        <div class="box-body">

<?php

$contact = $_POST['contact'];
$cont = preg_replace('/[^A-Za-z0-9\  ]/', '', $contact);

$nama_img = $_FILES['img']['name'];
$loc_img = $_FILES['img']['tmp_name'];
$type_img = $_FILES['img']['type'];

$cek         = array('png','jpg','jpeg','gif');
$x           = explode('.',$nama_img);
$extension   = strtolower(end($x));
$size_img  = $_FILES['img']['size'];

if ($nama_img == ""){
        
        $input  = mysqli_query($koneksi, "UPDATE karyawan SET
                    nama_karyawan  = '$_POST[nama_karyawan]',
                    unit           = '$_POST[unit]',
                    email          = '$_POST[email]',
                    contact        = '$cont',
                    username       = '$_POST[username]',
                    passwd         = '$_POST[passwd]',
                    id_role        = '$_POST[role_login]'
                    WHERE nip      = '$_POST[nip]'
                    ")  or die (mysqli_error($koneksi));

} else {

      if (in_array($extension, $cek) === TRUE){
        if ($size_img < 1000024){

          $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip='$_POST[nip]'"));
          unlink("data/img/karyawan/$data[img]");
          move_uploaded_file($loc_img,"data/img/karyawan/$nama_img");

        $input  = mysqli_query($koneksi, "UPDATE karyawan SET
                    nama_karyawan  = '$_POST[nama_karyawan]',
                    unit           = '$_POST[unit]',
                    email          = '$_POST[email]',
                    contact        = '$cont',
                    username       = '$_POST[username]',
                    passwd         = '$_POST[passwd]',
                    id_role        = '$_POST[role_login]',
                    img            = '$nama_img'
                    WHERE nip      = '$_POST[nip]'
                    ")  or die (mysqli_error($koneksi));
         
        } else { ?>
        <div class="callout callout-danger">
          <p>Ukuran file kebesaran <span class="fa fa-remove"></span>,
          <a href="?tampil=karyawan_edit&id=<?= $_POST['nip'] ?>">Edit Ulang</a></p> 
        </div>
        <?php }} else { ?>
        <div class="callout callout-danger">
          <p>Ekstensi file tidak sesuai <span class="fa fa-remove"></span>, 
          <a href="?tampil=karyawan_edit&id=<?= $_POST['nip'] ?>">Edit Ulang</a></p>
        </div>
        <?php }}

    if (isset($input)){ ?>
      <div class="callout callout-success">
        <p>Data karyawan berhasil diedit <span class="fa fa-check"></span></p> 
        <?php echo "<meta http-equiv='refresh' content='1;
        url=?tampil=karyawan'>"; ?>
      </div>
    <?php } ?>

        </div>
      </div>
    </div>
  </div>
</section>
