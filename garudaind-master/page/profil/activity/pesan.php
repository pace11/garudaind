<?php 

    $kar = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE username='$user'");
    $kar1 = mysqli_fetch_array($kar);
    $hit = mysqli_num_rows($kar);
if ($hit > 0 ) {
    $datal = $kar1['nip'];
    $role = $kar1['id_role'];
} else {
    $ven = mysqli_query($koneksi, "SELECT * FROM master_vendor WHERE username='$user'");
    $ven1 = mysqli_fetch_array($ven);
    $datal = $ven1['id_vendor'];
    $role = $ven1['id_role'];
}

?>

<a class="btn btn-primary" href="#" data-target="#modal_tambah" data-toggle="modal">
    <span class="fa fa-plus-circle"></span> Buat Pesan
</a><br><br>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>NO</th>
        <th>SUBJEK</th>
        <th>ISI PESAN</th>
        <th>JAWABAN</th>
        <th>TANGGAL</th>
    </tr>
    </thead>
    <tbody>

        <?php

            $no = 1;

            $sql = mysqli_query($koneksi, "SELECT * FROM pesan
                                           WHERE nip='$datal' OR id_vendor='$datal'
                                           ORDER BY created_at DESC")
            or die(mysqli_error($koneksi));

            while($data = mysqli_fetch_array($sql)){
            
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['subjek']; ?></td>
            <td><?php echo $data['isi']; ?></td>
            <td>
            <?php if($data['jawaban'] != "") {
            echo $data['jawaban'];
            echo " <a class='btn btn-success btn-xs'><i class='fa fa-check'></i></a>";
            } else { ?>
            <a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Belum</a>
            <?php } ?>
            </td>
            <td><?php echo $data['created_at'];?></td>
        </tr>

        <?php
            $no++;
        }
        ?>

        </tbody>
    </table>
</div>

<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
                <i class="fa fa-edit"></i> 
                Input pesan
            </h4>
            </div>

            <div class="modal-body">
            <form action="page/profil/activity/pesan_pro.php" method="POST" name="modal_popup" enctype="multipart/form-data"
            class="form-horizontal">
                      
                <div class="form-group">
                  <label class="label-control col-md-2">SUBJEK</label>
                  <div class="col-md-10">
                    <input type="hidden" name="role" value="<?php echo $role; ?>">
                    <input type="hidden" name="id" value="<?php echo $datal; ?>">
                    <input type="text" class="form-control" name="subjek" placeholder="Isikan subjek ..." required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-2">ISI PESAN</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="isi_pesan" rows="5" placeholder="Isikan pesan ..." required></textarea>
                  </div>
                </div>

                <div class="modal-footer">
                <div class="pull-right">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Kirim">
                  <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
                  </div>
                </div>
                

            </form>
            </div>
        </div>
        </div>
    </div>