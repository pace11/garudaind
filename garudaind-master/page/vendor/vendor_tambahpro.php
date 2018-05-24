<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><b>Karyawan</b> | Tambah</h3>
      </div>

        <div class="box-body">

          <?php
            if (isset($_POST['simpan'])){
            
            $id ="VENDOR".$_POST['id'];
            $contact ="628".$_POST['contact'];
            $cont = preg_replace('/-/', '', $contact);
            $alamat = addslashes($_POST['alamat']);

            $nama_img = $_FILES['img']['name'];
            $loc_img = $_FILES['img']['tmp_name'];
            $type_img = $_FILES['img']['type'];

            $cek         = array('png','jpg','jpeg','gif');
            $x           = explode('.',$nama_img);
            $extension   = strtolower(end($x));
            $size_img  = $_FILES['img']['size'];

            if (in_array($extension, $cek) === TRUE){
              if ($size_img < 1000024){

                move_uploaded_file($loc_img,"data/img/vendor/$nama_img");
                
                $input  = mysqli_query($koneksi, "INSERT INTO master_vendor SET
                        id_vendor         = '$id',
                        nama_perusahaan   = '$_POST[nama_perusahaan]',
                        email_vendor      = '$_POST[email]',
                        alamat_vendor     = '$alamat',
                        contact_vendor    = '$cont',
                        username          = '$_POST[username]',
                        passwd            = '$_POST[passwd]',
                        id_role           = '$_POST[role_login]',
                        img               = '$nama_img' 
                        ")  or die (mysqli_error($koneksi));

            if ($input){ ?>
                <div class="callout callout-success">
                  <p>Data vendor berhasil disimpan <span class="fa fa-check"></span></p> 
                  <?php echo "<meta http-equiv='refresh' content='1;
                  url=?tampil=vendor'>"; ?>
                </div>
            <?php } 
            } else { ?>
            <div class="callout callout-danger">
              <p>Ukuran file kebesaran <span class="fa fa-remove"></span>,
              <a href="?tampil=vendor">Upload Ulang</a></p> 
            </div>
            <?php }} else { ?>
            <div class="callout callout-danger">
              <p>Ekstensi file tidak sesuai <span class="fa fa-remove"></span>, 
              <a href="?tampil=vendor">Upload Ulang</a></p>
            </div>
            <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</section>
