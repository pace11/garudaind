<?php


  $tampil = mysqli_query($koneksi, "SELECT * FROM master_vendor WHERE id_vendor='$_GET[id]'")
            or die (mysqli_error($koneksi));
  $data   = mysqli_fetch_array($tampil);
 ?>

<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><b>Vendor</b> | Edit</h3>
      </div>

        <div class="box-body">

          <form name="tambah" action="?tampil=vendor_editpro" method="post" enctype="multipart/form-data"
          class="form-horizontal">

          <div class="col-md-6">

            <div class="form-group">
            <label class="label-control col-md-4">AKSES</label>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">VENDOR</button>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">ID</label>
              <div class="col-md-4">
                <input value="<?= $data['id_vendor']; ?>" type="text" name="id" class="form-control" readonly="readonly">
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">NAMA PERUSAHAAN</label>
              <div class="col-md-8">
                <input value="<?= $data['nama_perusahaan']; ?>" type="text" name="nama_perusahaan" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">EMAIL</label>
              <div class="col-md-8">
                <input value="<?= $data['email_vendor']; ?>" type="text" name="email" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">ALAMAT</label>
              <div class="col-md-8">
                <textarea class="form-control" name="alamat" cols="5" rows="4"><?= $data['alamat_vendor']; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">CONTACT</label>
              <div class="col-md-8">
              <input type="text" value="<?= $data['contact_vendor'] ?>" class="form-control" name="contact" data-inputmask='"mask": "(+628)-99-9999-9999"' data-mask required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">IMAGE</label>
                <div class="col-md-6">
                  <img src="data/img/vendor/<?= $data['img']; ?>" width="100"><br><br>
                  <input type="file" name="img" class="form-control">
                </div>
              <code>.Maks 1 MB</code>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading"> <span class="glyphicon glyphicon-lock"></span> Data Akun</div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">USERNAME</label>
              <div class="col-md-6">
                <input value="<?= $data['username']; ?>" type="text" class="form-control" name="username" maxlength="10" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">PASSWORD</label>
              <div class="col-md-6">
                <input value="<?= $data['passwd']; ?>" type="text" class="form-control" name="passwd" maxlength="6" required>
              </div>
            </div>

          </div>
        </div>

          <div class="box-footer">
            <div class="form-group">
              <label class="col-md-2"></label>
              <div class="col-md-4">
                <button type="Submit" name="tambah" class="btn btn-primary">
                  <span class="fa fa-edit"></span> Edit</button>
                <a href="?tampil=vendor" class="btn btn-danger"><span class="fa fa-remove"></span> Tutup</a>
              </div>
            </div>
          </div>

          </form>

        </div>
    </div>
  </div>


</div>
</section>
