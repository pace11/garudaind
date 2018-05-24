<section class="content">  
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">   
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Chart Report</b> | <i class="fa fa-code-fork"></i> <?php echo $nama; ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form action="" method="post">  
              <div class="col-md-4">
                <select class="form-control" name="kontrak" id="kontrak">
                  <option value="">-- pilih satu --</option>
                  <?php
                  $sql = mysqli_query($koneksi, "SELECT * FROM kontrak ORDER BY id_kontrak");
                  while ($row = mysqli_fetch_array($sql)){
                    echo "<option value=$row[id_kontrak]>$row[type]</option> \n";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-4">
                <select class="form-control" name="varian" id="varian">
                  <option>-- pilih satu --</option>
                </select>
              </div>
              <div class="col-md-4">
                </i><input type="submit" class="btn btn-primary btn-sm btn-submit" name="cek" value="cek">
              </div>
            </form>
            <?php 
            if (isset($_POST['cek'])){
              
              $kontrak = $_POST['kontrak'];
              $varian = $_POST['varian'];

              $bln = mysqli_query($koneksi, "SELECT * FROM bulan");
              $nil = mysqli_query($koneksi, "SELECT * FROM report_vendor
                                            JOIN bulan ON report_vendor.id_bulan=bulan.id_bulan
                                            WHERE report_vendor.id_vendor='$id' AND report_vendor.id_kontrak='$kontrak'
                                            AND report_vendor.id_varkontrak='$varian'");
               $nila = mysqli_query($koneksi, "SELECT sla FROM report_vendor
                                 JOIN bulan ON report_vendor.id_bulan=bulan.id_bulan
                                 WHERE report_vendor.id_vendor='$id'AND report_vendor.id_kontrak='$kontrak'
                                            AND report_vendor.id_varkontrak='$varian'");
            ?>
            <div class="chart">
              <canvas id="areaChart" style="height:250px"></canvas>
            </div>
            <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Type Kontrak</b> | <i class="fa fa-code-fork"></i> <?php echo $nama; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th style="width: 10px">#</th>
                <th>Jenis</th>
                <th>Nama</th>
                <th>Progress</th>
                <th>Label</th>
              </tr>
              <?php
                $no=1;
                $tipe = mysqli_query($koneksi,"SELECT type, type_varian, count(type) AS jumlah FROM report_vendor
                                              JOIN kontrak ON report_vendor.id_kontrak=kontrak.id_kontrak
                                              JOIN varian_kontrak ON report_vendor.id_varkontrak=varian_kontrak.id_varkontrak
                                              WHERE report_vendor.id_vendor='$id'
                                              GROUP BY type")
                or die(mysqli_error($koneksi));
                while($dtipe = mysqli_fetch_array($tipe)) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $dtipe['type']; ?></td>
                <td><?php echo $dtipe['type_varian']; ?></td>
                <td>
                  <?php $a = $dtipe['jumlah']; $b = $a/12; $c = round($b*100,2);?>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: <?= $c ?>%"></div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-light-blue"><?= $c."%" ?></span>
                  <span class="badge bg-red"><?= $dtipe['jumlah']."/12 Bulan" ?></span>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-warning"> <!-- box primary -->
        <div class="box-header with-border">
          <h3 class="box-title"><b>Kontrak</b> | List</h3>
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
                <th>AKSI</th>
              </tr>
              </thead>
              <tbody>

                <?php

                    $no = 1;
                      $sql = mysqli_query($koneksi, "SELECT * FROM varian_kontrak
                                          JOIN kontrak ON varian_kontrak.id_kontrak=kontrak.id_kontrak
                                          JOIN master_vendor ON varian_kontrak.id_vendor=master_vendor.id_vendor
                                          WHERE varian_kontrak.id_vendor='$id'
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
                    <td>
                      <a href="#" class='btn btn-primary btn-sm open_modal' id='<?php echo $data['id_varkontrak'] ?>'>
                      <span class="fa fa-edit" aria-hidden="true"></span> Buat Report</a>
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
      </div>
    </div>

    <!-- Modal Popup untuk Edit-->
    <div id="ModalSimpan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      </div>

      <!-- Javascript untuk popup modal Edit-->
      <script type="text/javascript">
         $(document).ready(function () {
         $(".open_modal").click(function(e) {
            var m = $(this).attr("id");
      		   $.ajax({
          			   url: "page/report_vendor/report_tambah.php",
          			   type: "GET",
          			   data : {id_varkontrak: m,},
          			   success: function (ajaxData){
            			   $("#ModalSimpan").html(ajaxData);
            			   $("#ModalSimpan").modal('show',{backdrop: 'true'});
            		   }
          		   });
              });
            });
      </script>
  </div>

  <div class="row">
    
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Report Data</b> | <i class="fa fa-code-fork"></i> <?php echo $nama; ?></h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">JENIS</th>
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

              <div class="modal-body">
              <form action="?tampil=report_tambahpro" method="POST" name="modal_popup" enctype="multipart/form-data"
              class="form-horizontal">
                  
                  <div class="form-group">
                    <label class="label-control col-md-3">ID</label>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="id" value="<?= $id ?>" readonly="readonly">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">TAHUN</label>
                    <div class="col-md-4">
                      <select class="form-control" name="tahun">
                        <option>-- pilih salah satu --</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">BULAN</label>
                    <div class="col-md-4">
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
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">JENIS KONTRAK</label>
                    <div class="col-md-4">
                    <select class="form-control" name="kontrak" id="kontrak2">
                      <option value="">-- jenis kontrak --</option>
                      <?php
                      $sql = mysqli_query($koneksi, "SELECT * FROM kontrak ORDER BY id_kontrak");
                      while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=$row[id_kontrak]>$row[type]</option> \n";
                      }
                      ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">NAMA KONTRAK</label>
                    <div class="col-md-4">
                    <select class="form-control" name="varian" id="varian2">
                      <option>-- pilih salah satu --</option>
                    </select>
                    </div>
                  </div>

                  <div class="panel panel-primary">
                    <div class="panel-heading"> <span class="fa fa-file-text-o"></span> Data Report</div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">LINK REPORT</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="link" rows="3" placeholder="isikan link disini ..." required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">SLA</label>
                    <div class="col-md-4">
                      <input class="form-control" type="text" placeholder="ex : 98.99" name="sla" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label-control col-md-3">PERFORMANCE</label>
                    <div class="col-md-4">
                      <input class="form-control" type="text" placeholder="ex : 98.99" name="perform" required>
                    </div>
                  </div>

                  <div class="modal-footer">
                  <div class="pull-right">
                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                    <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
                    </div>
                  </div>
                  

              </form>
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
      labels  : [<?php while($data=mysqli_fetch_array($bln)){echo "'".substr($data['nama_bulan'],0,3)."',";}?>],
      datasets: [
        //chart line kedua
        {
          label               : 'Electronics',
          fillColor           : '#f9ada4',
          strokeColor         : 'rgba(223,22,22)',
          pointColor          : '#df1616',
          pointStrokeColor    : 'rgba(223,22,22)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(223,22,22)' ,
          data                : [ <?php while($dataaa=mysqli_fetch_array($nila)){echo $dataaa['sla'].",";} ?>]
        },
        {
          label               : 'Digital Goods',
          fillColor           : '#dfdfdf',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            <?php while($dataa=mysqli_fetch_array($nil)){echo $dataa['performance'].",";} ?>]
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

  