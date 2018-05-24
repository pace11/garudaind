<section class="content">
<div class="row">

<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><b>Karyawan</b> | Data</h3>
      <div class="pull-right">
      </div>
    </div>

    <div class="box-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>NO</th>
          <th>#</th>
          <th>NIP</th>
          <th>STATUS</th>
          <th>NAMA</th>
          <th>UNIT</th>
          <th>EMAIL</th>
          <th>CONTACT</th>
        
        </tr>
        </thead>
        <tbody>

          <?php

              $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM karyawan
                                    JOIN role_login ON karyawan.id_role=role_login.id_role
                                    GROUP BY karyawan.nip")
                or die(mysqli_error($koneksi));

                while($data = mysqli_fetch_array($sql)){
               
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><img src="data/img/karyawan/<?php echo $data['img']; ?>" width="100"></td>
              <td><?php echo $data['nip']; ?></td>
              <td><a class="btn btn-success btn-xs"><span class="fa fa-user"></span> <?php echo $data['status']; ?></a></td>
              <td><?php echo $data['nama_karyawan']; ?>  
              </td>
              <td><?php echo $data['unit']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['contact']; ?></td> 
             
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

<script src="src/bower_components/bootstrap/dist/js/konfirmasi.js"></script>
