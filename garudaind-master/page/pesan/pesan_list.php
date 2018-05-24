<?php 

function nip($nip)
{
  include 'lib/koneksi.php';
  $sql1 = mysqli_query($koneksi, "SELECT * FROM pesan
                                  JOIN karyawan ON pesan.nip=karyawan.nip
                                  JOIN role_login ON role_login.id_role=karyawan.id_role
                                  WHERE pesan.nip='$nip' LIMIT 1");
  while($data1 = mysqli_fetch_array($sql1))
  echo $data1['nama_karyawan']." <a class='btn btn-success btn-xs'><i class='fa fa-user'></i> $data1[status]</a>";
}

function vendor($ven)
{
  include 'lib/koneksi.php';
  $sql2 = mysqli_query($koneksi, "SELECT * FROM pesan
                                  JOIN master_vendor ON pesan.id_vendor=master_vendor.id_vendor
                                  JOIN role_login ON role_login.id_role=master_vendor.id_role
                                  WHERE pesan.id_vendor='$ven' LIMIT 1");
  while($data2 = mysqli_fetch_array($sql2))
  echo $data2['nama_perusahaan']." <a class='btn btn-success btn-xs'><i class='fa fa-code-fork'></i> $data2[status]</a>";
}


?>

<section class="content">
<div class="row">

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><b>Pesan</b> | Data</h3>
    </div>

    <div class="box-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>NO</th>
          <th>SUBJEK</th>
          <th>ISI PESAN</th>
          <th>JAWABAN</th>
          <th>PENANYA</th>
          <th>TANGGAL</th>
          <th>AKSI</th>
        </tr>
        </thead>
        <tbody>

          <?php

              $no = 1;

                $sql = mysqli_query($koneksi, "SELECT * FROM pesan
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
              } else { ?>
                <a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Belum</a>
              <?php } ?>
              </td>
              <td>
              <?php 



                if ($data['nip'] != "") { 
                  $nip = $data['nip'];
                  nip($nip);
                } else {
                  $ven = $data['id_vendor'];
                  vendor($ven);
                }
              ?>
              </td>
              <td><?php echo $data['created_at'];?></td> 
              <td>
                <?php if ($data['jawaban'] != "") {
                  echo "<a class='btn btn-primary btn-xs'><i class='fa fa-check'></i> Sudah</a>";
                } else { ?>
                  <a href="#" class='btn btn-warning btn-xs open_modal' id='<?php echo $data['id_pesan'] ?>'>
                    <span class="fa fa-send" aria-hidden="true"></span> Balas</a>
                <?php } ?>
              </td>
            </tr>

            <?php
              $no++;
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>

      <!-- Modal Popup untuk Edit-->
      <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      </div>

      <!-- Javascript untuk popup modal Edit-->
      <script type="text/javascript">
         $(document).ready(function () {
         $(".open_modal").click(function(e) {
            var m = $(this).attr("id");
      		   $.ajax({
          			   url: "page/pesan/pesan_jawab.php",
          			   type: "GET",
          			   data : {id_pesan: m,},
          			   success: function (ajaxData){
            			   $("#ModalEdit").html(ajaxData);
            			   $("#ModalEdit").modal('show',{backdrop: 'true'});
            		   }
          		   });
              });
            });
      </script>
