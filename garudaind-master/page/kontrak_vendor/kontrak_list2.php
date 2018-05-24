<?php
function isivendors($id){
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
  $no++;
}}
?>

<section class="content">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-warning"> <!-- box primary -->
        <div class="box-header with-border">
          <h3 class="box-title"><b>Kontrak</b> | List</h3>
          <div class="box-tools pull-right">
           
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>NO</th>
                <th>JENIS</th>
                <th>NAMA KONTRAK</th>
                <th>TAHUN</th>
                <th>JANGKA KONTRAK</th>
                <th>SLA</th>
                <th>VENDOR</th>
            
              </tr>
              </thead>
              <tbody>

                <?php

                    $no = 1;
                      $sql = mysqli_query($koneksi, "SELECT * FROM varian_kontrak
                                          JOIN kontrak ON varian_kontrak.id_kontrak=kontrak.id_kontrak
                                          JOIN master_vendor ON varian_kontrak.id_vendor=master_vendor.id_vendor
                                          ORDER BY id_varkontrak")
                      or die(mysqli_error($koneksi));

                      while($data = mysqli_fetch_array($sql)){
                    
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td><?php echo $data['type_varian']; ?></td>
                    <td><?php echo $data['tahun']; ?></td>
                    <td>
                      <?php
                      $bm = $data['bulan_mulai'];
                      $bs = $data['bulan_selesai'];
                      bulan_mulai($bm);echo " - ";bulan_selesai($bs) ;

                      ?>
                    </td>
                    <td><?php echo $data['sla']; ?></td>
                    <td><i class="fa fa-code-fork"></i> <?php echo $data['nama_perusahaan']; ?></td>
                    
                  </tr>

                  <?php
                    $no++;
                  }
                  ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
      
    </div>
    
 

  </div>  
  <div class="row"> <!-- row -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-primary"> <!-- box primary -->
        <div class="box-header with-border">
          <h3 class="box-title"><b>Kontrak</b> Vendor</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body"> <!-- box body -->
          <div class="box-group" id="accordion">
            <?php 
            $no=1;
            $a=0;
            $nil = array("danger","success","primary","warning","info");
            $jumlah = count($nil);
            $vend = mysqli_query($koneksi, "SELECT * FROM report_vendor
                                            JOIN master_vendor ON report_vendor.id_vendor=master_vendor.id_vendor
                                            GROUP BY report_vendor.id_vendor ASC");
            while ($dvend = mysqli_fetch_array($vend)) {
            ?>
              
              <div class="panel box box-<?php if ($a < $jumlah){ echo $nil[$a]; } else { $a=0; echo $nil[$a]; } ?>">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $no ?>">
                      <button class="btn btn-primary btn-xs"><?= $no ?></button>
                      <i class="fa fa-code-fork"></i> <?= $dvend['nama_perusahaan'] ?>
                    </a>
                  </h4>
                </div>
                <div id="collapse<?= $no ?>" class="panel-collapse collapse <?php if ($no == 1){ echo "in"; } ?>">
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Jenis</th>
                          <th>Nama</th>
                          <th>Progress</th>
                          <th>Label</th>
                          <?php 
                          $id = $dvend['id_vendor']; 
                          isivendors($id);
                          ?>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <?php $no++; $a++; } ?>
          </div>
        </div> <!-- box body -->
      </div>  <!-- box primary -->
    </div>  
  </div> <!-- row -->
</section>  