<?php 

$sql1 = mysqli_query($koneksi, "SELECT * FROM karyawan");
$users = mysqli_num_rows($sql1);

$sql2 = mysqli_query($koneksi, "SELECT * FROM master_vendor");
$vendor = mysqli_num_rows($sql2);

function isivendor($id){
    include 'lib/koneksi.php';
    $no=1;
    $tipe = mysqli_query($koneksi,"SELECT type, type_varian, count(type) AS jumlah FROM report_vendor
                                  JOIN kontrak ON report_vendor.id_kontrak=kontrak.id_kontrak
                                  JOIN varian_kontrak ON report_vendor.id_varkontrak=varian_kontrak.id_varkontrak
                                  WHERE report_vendor.id_vendor='$id'
                                  GROUP BY type")
    or die(mysqli_error($koneksi));
    while($dtipe = mysqli_fetch_array($tipe)) {
      $a = $dtipe['jumlah']; $b = $a/12; $c = round($b*100,2);

    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>$dtipe[type]</td>";
    echo "<td>$dtipe[type_varian]</td>";
    echo "<td>";
    echo "<div class='progress progress-xs progress-striped active'>";
    echo "<div class='progress-bar progress-bar-primary' style='width:$c%'></div>";
    echo "</div>";
    echo "</td>";
    echo "<td><span class='badge bg-light-blue'>".$c."%"."</span>"." ";
    echo "<span class='badge bg-red'>$dtipe[jumlah]"."/12 Bulan"."</span>";
    echo "</td>";
    echo "</tr>";
  }}
?>


<!-- isi halaman -->

  <div class="row">
      <div class="col-md-7 col-sm-6 col-xs-12">
          
        <div class="box box-primary">
          
          </div>
          <!-- /.box-body -->
        </div>
        
      </div>

      <div class="col-md-10 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Report</b> Vendor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                
                <?php 
                $no=1;
                $vend = mysqli_query($koneksi, "SELECT * FROM master_vendor");
                while ($dvend = mysqli_fetch_array($vend)) {
                ?>
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $no ?>">
                        <i class="fa fa-code-fork"></i> <?= $dvend['nama_perusahaan'] ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?= $no ?>" class="panel-collapse collapse <?php if ($no == 1){echo "in"; } ?>">
                      <div class="box-body">
                        <table class="table table-bordered">
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
                                                 WHERE report_vendor.id_vendor='$id'
                                                 ORDER BY report_vendor.id_kontrak ASC")
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
                          </tr>
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php $no++; } ?>
              </div>
            </div>
        </div>
      </div>
    </div>

</section>
