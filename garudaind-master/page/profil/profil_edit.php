<?php
include "../../lib/koneksi.php";
$id = $_GET['id'];
$id_role = $_GET['role'];

if ($id_role == 1 || $id_role == 2) {
    $sql = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE nip='$id'");
    $data = mysqli_fetch_array($sql);
} else {
    $sql = mysqli_query($koneksi,"SELECT * FROM master_vendor WHERE id_vendor='$id'");
    $data = mysqli_fetch_array($sql);
}
        

?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Profil</h4>
        </div>

        <div class="modal-body">
        	<form action="page/pesan/pesan_jawabpro.php" name="modal_popup" enctype="multipart/form-data" method="POST"
            class="form-horizontal">

                <div class="form-group">
                  <label class="label-control col-md-3">ID</label>
                  <div class="col-md-4">
                    <?php if ($id_role == 1 || $id_role == 2) { ?>
                        <input type="text" class="form-control" value="<?= $data['nip'] ?>" name="id" readonly="readonly">
                    <?php } else { ?>
                        <input type="text" class="form-control" value="<?= $data['id_vendor'] ?>" name="id" readonly="readonly">
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">NAMA</label>
                  <div class="col-md-6">
                    <?php if ($id_role == 1 || $id_role == 2 ) { ?>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_karyawan'] ?>" required>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_perusahaan'] ?>" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">EMAIL</label>
                  <div class="col-md-6">
                    <?php if ($id_role == 1 || $id_role == 2 ) { ?>
                        <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>" required>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="email" value="<?= $data['email_vendor'] ?>" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">CONTACT</label>
                  <div class="col-md-6">
                    <?php if ($id_role == 1 || $id_role == 2 ) { ?>
                        <input type="text" class="form-control" name="contact" value="<?= $data['contact'] ?>" maxlength="13" required>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="contact" value="<?= $data['contact_vendor'] ?>" maxlength="13" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">
                  <?php if ($id_role == 1 || $id_role == 2 ) { echo "UNIT"; } else { echo "ALAMAT"; }?>
                  </label>
                  <div class="col-md-6">
                    <?php if ($id_role == 1 || $id_role == 2 ) { ?>
                        <input type="text" class="form-control" name="unit" value="<?= $data['unit'] ?>" required>
                    <?php } else { ?>
                        <textarea class="form-control" rows="5" name="alamat" required><?= $data['alamat_vendor'] ?></textarea>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                    <label class="label-control col-md-3">IMAGE</label>
                        <div class="col-md-6">
                        <?php if ($id_role == 1 || $id_role == 2) { ?>
                            <img src="data/img/karyawan/<?= $data['img']; ?>" width="100"><br><br>
                            <input type="file" name="img" class="form-control">
                        <?php } else { ?>
                            <img src="data/img/vendor/<?= $data['img']; ?>" width="100"><br><br>
                            <input type="file" name="img" class="form-control">
                        <?php } ?>
                        </div>
                    <code>.Maks 1 MB</code>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Simpan</button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <i class="glyphicon glyphicon-remove"></i> Tutup</button>
	            </div>

            	</form>
            </div>

        </div>
    </div>
