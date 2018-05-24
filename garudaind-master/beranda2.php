<?php 

$sql1 = mysqli_query($koneksi, "SELECT * FROM karyawan");
$users = mysqli_num_rows($sql1);

$sql2 = mysqli_query($koneksi, "SELECT * FROM master_vendor");
$vendor = mysqli_num_rows($sql2);

$sql3 = mysqli_query($koneksi, "SELECT * FROM report_vendor");
$kont = mysqli_num_rows($sql3);

function kontrak(){
  include 'lib/koneksi.php';
  $kontrak = mysqli_query($koneksi, "SELECT type, count(type) AS jumlah FROM report_vendor
                                     JOIN kontrak ON report_vendor.id_kontrak=kontrak.id_kontrak
                                     GROUP BY type")
                                     or die (mysqli_error($koneksi));
  while($dkon = mysqli_fetch_array($kontrak)){
    echo "$dkon[type]"." <a class='btn btn-danger btn-xs'>$dkon[jumlah]</a> ";
    }
  }
?>
<section class="content-header">
  <h1>
    Dashboard
    <small>Administrator</small>
  </h1>
  <ol class="breadcrumb">
    <li><a><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- isi halaman -->
<section class="content">
  <div class="row">
    <div class="col-xs-12"> 
      
        <div class="clearfix visible-sm-block"></div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Karyawan</span>
              <span class="info-box-number">
                <?= $users; ?>
              </span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-code-fork"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Vendor</span>
              <span class="info-box-number">
                <?= $vendor; ?>
              </span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-code-fork"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kontrak</span>
              <span class="info-box-number">
                <?= $kont ?>  
              </span>
              <p><?php kontrak() ?></p>
            </div>
          </div>
        </div>
    
    </div>
  </div>

  <div class="row">
      <div class="col-md-7 col-sm-6 col-xs-12">
          
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Chart</b> Report</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            <form action="" method="post">  
              <div class="col-md-3">
                <select class="form-control" name="vendor" required>
                  <option value="">-- pilih satu --</option>
                  <?php
                  $ven = mysqli_query($koneksi, "SELECT * FROM master_vendor");
                  while ($rowven = mysqli_fetch_array($ven)){
                    echo "<option value=$rowven[id_vendor]>$rowven[nama_perusahaan]</option> \n";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-control" name="kontrak" id="kontrak" required>
                  <option value="">-- pilih satu --</option>
                  <?php
                  $sql = mysqli_query($koneksi, "SELECT * FROM kontrak ORDER BY id_kontrak");
                  while ($row = mysqli_fetch_array($sql)){
                    echo "<option value=$row[id_kontrak]>$row[type]</option> \n";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-control" name="varian" id="varian" required>
                  <option>-- pilih satu --</option>
                </select>
              </div>
              <div class="col-md-2">
                </i><input type="submit" class="btn btn-primary btn-sm btn-submit" name="cek" value="cek">
              </div>
            </form>
            <?php
            
            if (isset($_POST['cek'])){

              $id = $_POST['vendor'];
              $kon = $_POST['kontrak'];
              $var = $_POST['varian'];

              $nama = mysqli_query($koneksi, "SELECT * FROM master_vendor WHERE id_vendor='$id'");
              $ceknama = mysqli_fetch_array($nama);
              
              $blnn = mysqli_query($koneksi, "SELECT * FROM bulan");
              $nill = mysqli_query($koneksi, "SELECT * FROM report_vendor
                                             JOIN bulan ON report_vendor.id_bulan=bulan.id_bulan
                                             WHERE report_vendor.id_vendor='$id' AND report_vendor.id_kontrak='$kon'
                                             AND report_vendor.id_varkontrak='$var'");
            ?>
            <br><br>
            <div class="col-md-12"> 
              <a class="btn btn-primary"><i class="fa fa-code-fork"></i> <?php echo $ceknama['nama_perusahaan']; ?></a>
            </div>
            <div class="chart">
              <canvas id="areaChart" style="height:250px"></canvas>
            </div>
            <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        
      </div>

      <div class="col-md-5 col-sm-6 col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Kontrak</b> Vendor</h3>
              <a href="?tampil=report_vendorad" title="lihat data" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>

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
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Progress</th>
                            <th>Label</th>
                            <?php 
                            $id = $dvend['id_vendor']; 
                            isivendor($id);
                            ?>
                          </tr>
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
<!-- isi halaman -->

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : [<?php while($data=mysqli_fetch_array($blnn)){echo "'".substr($data['nama_bulan'],0,3)."',";}?>],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : '#dfdfdf',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            <?php while($dataa=mysqli_fetch_array($nill)){echo $dataa['performance'].",";} ?>]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : true,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 2,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
    
  })
</script>