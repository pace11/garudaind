
  <section class="content">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Report</b> | Data</h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">JENIS KONTRAK</th>
            <th rowspan="2">NAMA KONTRAK</th>
            <th colspan="2">PERIODE</th>
            <th rowspan="2">LINK REPORT</th>
            <th rowspan="2">SLA</th>
            <th rowspan="2">PERFORMANCE</th>
          </tr>
          <tr>
            <th>TAHUN</th>
            <th>BULAN</th>
          </tr>
          </thead>
          <tbody>
            
          <?php

                $no = 1;

                  $sql = mysqli_query($koneksi, "SELECT * FROM report_vendor
                                                 JOIN kontrak ON report_vendor.id_kontrak=kontrak.id_kontrak
                                                 JOIN varian_kontrak ON report_vendor.id_varkontrak=varian_kontrak.id_varkontrak
                                                 JOIN bulan ON report_vendor.id_bulan=bulan.id_bulan
                                                 WHERE report_vendor.id_vendor='$id'")
                  or die(mysqli_error($koneksi));

                  while($data = mysqli_fetch_array($sql)){
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td><?php echo $data['type_varian']; ?></td>
                    <td><?php echo $data['tahun']; ?></td>
                    <td><?php echo $data['nama_bulan']; ?></td>
                    <td><?php echo $data['link_report']; ?></td>
                    <td><?php echo $data['sla']."%"; ?></td>
                    <td><?php echo $data['performance']."%"; ?></td>         
                  </tr>

                  <?php
                  $no++;
                  }
                  ?>
          </tbody>
        </table>
      </div>

      <!-- Modal Tambah Data -->
      <div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">
                  <i class="fa fa-edit"></i> 
                  Input data report
              </h4>
              </div>

             
              </div>
          </div>
          </div>
      </div>

      <!-- modal Hapus-->
      <div id="vendor_hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"> <span class="glyphicon glyphicon-exclamation-sign"></span> Konfirmasi</h4>
              </div>
              <div class="modal-body">
                  Apakah Anda yakin ingin menghapus data ini ?
              </div>
              <div class="modal-footer">
                  <a href="javascript:;" class="btn btn-info" id="hapus-vendor"><i class="glyphicon glyphicon-ok"></i> Ya</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
              </div>

              </div>
          </div>
      </div>

    </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>