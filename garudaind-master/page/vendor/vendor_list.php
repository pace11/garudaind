<section class="content">
<div class="row">

<div class="col-xs-12">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title"><b>Vendor</b> | Data</h3>
      <div class="pull-right">
        <a class="btn btn-danger" href="#" data-target="#modal_tambah" data-toggle="modal">
          <span class="fa fa-plus-circle"></span> Tambah Data
        </a>
      </div>
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
          <th>AKSI</th>
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
              <td>
                <a href="?tampil=vendor_edit&id=<?php echo $data['id_vendor']; ?>" class="btn btn-primary btn-xs" title="edit">
                        <span class="fa fa-edit" aria-hidden="true"></span></a>
                <a href="javascript:;" data-id="<?php echo $data['id_vendor'] ?>" data-toggle="modal" data-target="#vendor_hapus"
                        class="btn btn-danger btn-xs" title="hapus">
                        <span class="fa fa-trash" aria-hidden="true"></span></a>
              </td>
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
                Input data vendor
            </h4>
            </div>

            <div class="modal-body">
            <form action="?tampil=vendor_tambahpro" method="POST" name="modal_popup" enctype="multipart/form-data"
            class="form-horizontal">
                
                <div class="form-group">
                  <label class="label-control col-md-3">AKSES</label>
                    <div class="col-md-4">
                      <input type="hidden" value="3" name="role_login">
                      <button class="btn btn-primary btn-sm">VENDOR</button>
                    </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">ID</label>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">VENDOR</span>
                      <input type="text" class="form-control" name="id" placeholder="ex : 0001" required/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">NAMA PERUSAHAAN</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="nama_perusahaan" placeholder="ex : Garuda Indonesia" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">EMAIL</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="ex : garuda@indonesia.com" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">ALAMAT</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="alamat" rows="3"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">CONTACT</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <span class="input-group-addon">+628</span>
                      <input type="text" class="form-control" name="contact" data-inputmask='"mask": "99-9999-9999"' data-mask required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">IMAGE</label>
                    <div class="col-md-6">
                      <input type="file" name="img" class="form-control">
                    </div>
                  <code>.Maks 1 MB</code>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3"></label>
                    <div class="col-md-9">
                      <code>Silakan upload gambar dengan ekstensi .jpeg/.jpg/.png/.gif</code>
                    </div>
                </div>

                <div class="panel panel-primary">
                  <div class="panel-heading"> <span class="glyphicon glyphicon-lock"></span> Data Akun</div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">USERNAME</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="username" maxlength="10" placeholder="ex : Garuda (max 10 karakter)" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control col-md-3">PASSWORD</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" name="passwd" maxlength="6" placeholder="ex : grdind (max 6 karakter)" required/>
                  </div>
                </div>

                <div class="modal-footer">
                <div class="pull-left">
                  <code>* semua form wajib diisi</code>  
                </div>
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
<script src="src/bower_components/bootstrap/dist/js/konfirmasi_vendor.js"></script>
