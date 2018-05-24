<?php
include "../../lib/koneksi.php";

$id = $_GET['id_varkontrak'];
$sql = mysqli_query($koneksi, "SELECT * FROM varian_kontrak
                                JOIN kontrak ON varian_kontrak.id_kontrak=kontrak.id_kontrak
                                JOIN master_vendor ON varian_kontrak.id_vendor=master_vendor.id_vendor
                                WHERE id_varkontrak=$id")
                      or die(mysqli_error($koneksi));
while($data = mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Buat Report</h4>
        </div>

        <div class="modal-body">
        	<form action="page/report_vendor/report_tambahpro.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                    <label for="Modal Name">ID VENDOR</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_varkontrak']; ?>">
                        <input type="text" class="form-control" name="id_vendor" value="<?php echo $data['id_vendor']; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="Modal Name">TAHUN</label>
                        <input type="text" class="form-control" name="tahun" value="<?php echo $data['tahun']; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="Modal Name">JENIS KONTRAK</label>
                        <input type="hidden" class="form-control" name="id_kontrak" value="<?php echo $data['id_kontrak']; ?>">
                        <input type="text" class="form-control" name="jenis_kontrak" value="<?php echo $data['type']; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="Modal Name">NAMA KONTRAK</label>
                        <input type="text" class="form-control" name="nama_kontrak" value="<?php echo $data['type_varian']; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="Modal Name">SLA</label>
                        <input type="text" class="form-control" name="sla" value="<?php echo $data['sla']; ?>" readonly="readonly">
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"> <span class="fa fa-file-text-o"></span> Data Report</div>
                </div>

                <div class="form-group">
                    <label for="Modal Name">BULAN</label>
                      <select class="form-control" name="bulan">
                        <option value="">-- pilih salah satu --</option>
                        <?php
                        $bulan = mysqli_query($koneksi, "SELECT * FROM bulan ORDER BY id_bulan ASC");
                        while ($rowbulan = mysqli_fetch_array($bulan)){
                          echo "<option value=$rowbulan[id_bulan]>$rowbulan[nama_bulan]</option> \n";
                        }
                        ?>
                      </select>
                </div>

                <div class="form-group">
                    <label for="Modal Name">LINK REPORT</label>
                        <textarea class="form-control" name="link" rows="2" placeholder="ex: https://garudaindonesia/etc" required></textarea>
                </div>

                <div class="form-group">
                    <label for="Modal Name">PERFORMANCE</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="perform" placeholder="ex: 98" required>
                      <span class="input-group-addon">%</span>
                    </div>
                </div>


	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Simpan</button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-remove"></i> Tutup</button>
	            </div>

            	</form>
             <?php } ?>
            </div>

        </div>
    </div>
