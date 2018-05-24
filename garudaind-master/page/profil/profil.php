<section class="content">

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?php echo $img; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nama; ?></h3>
              <p class="text-muted text-center"><?php echo $status; ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="pull-left">
                <h3 class="box-title">About Me</h3>
              </div>
              <div class="pull-right">
                <a href="#" class='btn btn-primary btn-xs open_modal' id='<?php echo $id ?>' title="edit profil">
                  <span class="fa fa-cog" aria-hidden="true"></span></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-tags -r-5"></i> ID</strong>
                <p class="text-muted"><?php echo $id; ?></p>
              <hr>
              <strong><i class="fa fa-envelope -r-5"></i> Email</strong>
                <p class="text-muted"><?php echo $email; ?></p>
              <hr>
              <strong><i class="fa fa-phone-square -r-5"></i> Contact</strong>
                <p class="text-muted"><?php echo $contact; ?></p>
              <?php if ($data['id_role'] == 1 || $data['id_role'] == 2 ) { ?>
                <hr>
                <strong><i class="fa fa-wrench -r-5"></i> Unit</strong>
                  <p class="text-muted"><?php echo $unit; ?></p>
              <?php } else { ?>
                <hr>
                <strong><i class="fa fa-map-marker -r-5"></i> Address</strong>
                  <p class="text-muted"><?php echo $alamat; ?></p>
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <?php include "activity/pesan.php" ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="callout callout-danger">
                  <p>-- belum ada data --</p>
                </div>
              </div>
              <!-- /.tab-pane -->  
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>

</section>

      <!-- Modal Popup untuk Edit-->
      <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      </div>

       <script type="text/javascript">
         $(document).ready(function () {
         $(".open_modal").click(function(e) {
      		   $.ajax({
          			   url: "page/profil/profil_edit.php",
          			   type: "GET",
          			   data : ({id: "<?php echo $id ?>",role: "<?php echo $role ?>"}),
          			   success: function (ajaxData){
            			   $("#ModalEdit").html(ajaxData);
            			   $("#ModalEdit").modal('show',{backdrop: 'true'});
            		   }
          		   });
              });
            });
      </script>