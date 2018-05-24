<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><b>Vendor</b> | Edit</h3>
      </div>

        <div class="box-body">

<?php

$alamat = addslashes($_POST['alamat']);
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
        
        $input  = mysqli_query($koneksi, "UPDATE master_vendor SET
                    nama_perusahaan  = '$_POST[nama_perusahaan]',
                    email_vendor     = '$_POST[email]',
                    alamat_vendor    = '$alamat',
                    contact_vendor   = '$cont',
                    username         = '$_POST[username]',
                    passwd           = '$_POST[passwd]'
                    WHERE id_vendor  = '$_POST[id]'
                    ")  or die (mysqli_error($koneksi));

} else {

      if (in_array($extension, $cek) === TRUE){
        if ($size_img < 1000024){

          $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM master_vendor WHERE id_vendor='$_POST[id]'"));
          unlink("data/img/vendor/$data[img]");
          move_uploaded_file($loc_img,"data/img/vendor/$nama_img");

        $input  = mysqli_query($koneksi, "UPDATE master_vendor SET
                    nama_perusahaan  = '$_POST[nama_perusahaan]',
                    email_vendor     = '$_POST[email]',
                    alamat_vendor    = '$alamat',
                    contact_vendor   = '$cont',
                    username         = '$_POST[username]',
                    passwd           = '$_POST[passwd]',
                    img              = '$nama_img'
                    WHERE id_vendor  = '$_POST[id]'
                    ")  or die (mysqli_error($koneksi));

        } else { ?>
        <div class="callout callout-danger">
          <p>Ukuran file kebesaran <span class="fa fa-remove"></span>,
          <a href="?tampil=vendor_edit&id=<?= $_POST['id_vendor'] ?>">Edit Ulang</a></p> 
        </div>
        <?php }} else { ?>
        <div class="callout callout-danger">
          <p>Ekstensi file tidak sesuai <span class="fa fa-remove"></span>, 
          <a href="?tampil=vendor_edit&id=<?= $_POST['id_vendor'] ?>">Edit Ulang</a></p>
        </div>
        <?php }}

    if (isset($input)){ ?>
      <div class="callout callout-success">
        <p>Data vendor berhasil diedit <span class="fa fa-check"></span></p> 
        <?php echo "<meta http-equiv='refresh' content='1;
        url=?tampil=vendor'>"; ?>
      </div>
    <?php } ?>

        </div>
      </div>
    </div>
  </div>
</section>
