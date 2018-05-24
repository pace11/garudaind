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
  echo "<td>";
  echo "<a class='btn btn-danger btn-xs'>hapus</a> <a class='btn btn-success btn-xs'>edit</a>";
  echo "</td>";
  echo "</tr>";
  $no++;
}}
?>

<section class="content">  
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
            $vend = mysqli_query($koneksi, "SELECT * FROM master_vendor");
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
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Progress</th>
                        <th>Label</th>
                        <th>Aksi</th>
                        <?php 
                        $id = $dvend['id_vendor']; 
                        isivendors($id);
                        ?>
                      </tr>
                    </table>
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