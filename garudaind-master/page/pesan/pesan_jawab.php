<?php
include "../../lib/koneksi.php";
$id = $_GET['id_pesan'];
$sql = mysqli_query($koneksi,"SELECT * FROM pesan WHERE id_pesan=$id");
while ($data = mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-send"></i> Balas Pertanyaan</h4>
        </div>

        <div class="modal-body">
        	<form action="page/pesan/pesan_jawabpro.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                	<label for="Modal Name">Pertanyaan</label>
                    <input type="hidden" name="id" value="<?php echo $data['id_pesan']; ?>">
     				        <textarea class="form-control" rows="3" disabled><?php echo $data['isi']; ?></textarea>
                </div>

                <div class="form-group">
                	<label for="Modal Name">Jawaban</label>
     				        <textarea class="form-control" name="jawaban" rows="4" placeholder="isi jawaban..." required></textarea>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
                    <i class="glyphicon glyphicon-send"></i> Balas</button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <i class="glyphicon glyphicon-remove"></i> Tutup</button>
	            </div>

            	</form>
             <?php } ?>
            </div>

        </div>
    </div>
