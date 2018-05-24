<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><b>Vendor</b> | Hapus</h3>
      </div>

        <div class="box-body">
          <div class="callout callout-success">

        <?php

        $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM karyawan WHERE nip='$_GET[id]'"));

          if ($data['img'] != "")
              unlink("data/img/karyawan/$data[img]");

              // querry untuk melakukan delete
              $input  = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nip='$_GET[id]'")
                                      or die (mysqli_error($koneksi));

            if ($input){
              echo"Karyawan berhasil dihapus";
              echo"<meta http-equiv='refresh' content='1;
              url=?tampil=karyawan'>";
            }
        ?>

 <span class="glyphicon glyphicon-ok"></span>
    </div>
    </div>
  </div>
</div>
</div>
</section>
