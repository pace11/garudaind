<section class="content">
<div class="row">

<div class="col-xs-12">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title"><b>Vendor</b> | Data</h3>
    </div>

    <div class="box-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>NO</th>
          <th>#</th>
          <th>ID</th>
          <th>STATUS</th>
          <th>PERUSAHAAN</th>
          <th>EMAIL</th>
          <th>ALAMAT</th>
          <th>CONTACT</th>
        </tr>
        </thead>
        <tbody>

          <?php

              $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM master_vendor 
                                              JOIN role_login ON master_vendor.id_role=role_login.id_role
                                              GROUP BY master_vendor.id_vendor ASC")
                or die(mysqli_error($koneksi));

                while($data = mysqli_fetch_array($sql)){
               
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><img src="data/img/vendor/<?php echo $data['img']; ?>" width="100"></td>
              <td><?php echo $data['id_vendor']; ?></td>
              <td><a class="btn btn-success btn-xs"><span class="fa fa-code-fork"></span> <?php echo $data['status'];?></a></td>
              <td><?php echo $data['nama_perusahaan']; ?>  
              </td>
              <td><?php echo $data['email_vendor']; ?></td>
              <td><?php echo $data['alamat_vendor']; ?></td>
              <td><?php echo $data['contact_vendor']; ?></td> 
              
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
<script src="src/bower_components/bootstrap/dist/js/konfirmasi_vendor.js"></script>
