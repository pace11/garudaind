<?php


  $tampil = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip='$_GET[id]'")
            or die (mysqli_error($koneksi));
  $data   = mysqli_fetch_array($tampil);
 ?>

<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><b>Karyawan</b> | Edit</h3>
      </div>

        <div class="box-body">

          <form name="tambah" action="?tampil=karyawan_editpro" method="post" enctype="multipart/form-data"
          class="form-horizontal">

          <div class="col-md-6">

            <div class="form-group">
            <label class="label-control col-md-4">AKSES</label>
              <div class="col-md-4">
                <select class="form-control" name="role_login">
                  <option>-- pilih salah satu --</option>
                  <option value="1" <?php if($data['id_role'] == 1) echo "selected"; ?>>ADMIN</option>
                  <option value="2" <?php if($data['id_role'] == 2) echo "selected"; ?>>SUPER USER</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">NIP</label>
              <div class="col-md-4">
                <input value="<?= $data['nip']; ?>" type="text" name="nip" class="form-control" readonly="readonly">
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">NAMA KARYAWAN</label>
              <div class="col-md-8">
                <input value="<?= $data['nama_karyawan']; ?>" type="text" name="nama_karyawan" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">UNIT</label>
              <div class="col-md-8">
                <input value="<?= $data['unit']; ?>" type="text" name="unit" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">EMAIL</label>
              <div class="col-md-8">
                <input value="<?= $data['email']; ?>" type="email" name="email" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">CONTACT</label>
              <div class="col-md-8">
                <input type="text" value="<?= $data['contact'] ?>" class="form-control" name="contact" data-inputmask='"mask": "(+628)-99-9999-9999"' data-mask required>
              </div>
            </div>

            <div class="form-group">
              <label class="label-control col-md-4">IMAGE</label>
                <div class="col-md-6">
                  <img src="data/img/karyawan/<?= $data['img']; ?>" width="100"><br><br>
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
                <a href="?tampil=karyawan" class="btn btn-danger"><span class="fa fa-remove"></span> Tutup</a>
              </div>
            </div>
          </div>

          </form>

        </div>
    </div>
  </div>


</div>
</section>
