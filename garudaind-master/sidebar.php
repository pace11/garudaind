<ul class="sidebar-menu" data-widget="tree">

  <li class="header">MAIN SIDEBAR</li>
  
  <?php if ($data['id_role'] == 2 || $data['id_role'] == 3 ) { ?>
  
  <li class="<?php if ($_GET['tampil'] == 'beranda'){ echo "active"; }?>">
    <a href="?tampil=beranda">
      <i class="fa fa-dashboard"></i> <span>Beranda</span>
    </a>
  </li>
 <li class="treeview <?php if ($_GET['tampil'] ==   'karyawan2' || $_GET['tampil'] == 'vendor'
                                || $_GET['tampil'] == 'karyawan_edit' || $_GET['tampil'] == 'vendor_edit'
                                || $_GET['tampil'] == 'karyawan_editpro' || $_GET['tampil'] == 'vendor_editpro'
                                || $_GET['tampil'] == 'karyawan_hapus' || $_GET['tampil'] == 'vendor_hapus'
                                || $_GET['tampil'] == 'pesan' || $_GET['tampil'] == 'kontrak_vendor')
                                { echo "active"; }?>">
    <a href="#">
      <i class="fa fa-cog"></i> <span>Manajemen</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="<?php if ($_GET['tampil'] == 'karyawan2' || $_GET['tampil'] == 'karyawan_edit'
                           || $_GET['tampil'] == 'karyawan_hapus' || $_GET['tampil'] == 'karyawan_editpro'){echo "active";} ?>">
        <a href="?tampil=karyawan2">
          <i class="fa fa-users"></i> Karyawan
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'vendor2' || $_GET['tampil'] == 'vendor_edit'
                          || $_GET['tampil'] == 'vendor_hapus' || $_GET['tampil'] == 'vendor_editpro'){echo "active";} ?>">
        <a href="?tampil=vendor2">
          <i class="fa fa-code-fork"></i> Vendor
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'pesan'){echo "active";} ?>">
        <a href="?tampil=pesan">
          <i class="fa fa-commenting"></i> Pesan
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $hitpesan; ?></small>
            </span>
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'kontrak_vendor2'){ echo "active"; }?>">
        <a href="?tampil=kontrak_vendor2">
          <i class="fa fa-suitcase"></i> <span>Kontrak</span>
        </a>
      </li>
    </ul>

  </li>
  <?php } ?>

  <?php if ($data['id_role'] == 1) { ?>

  <li class="<?php if ($_GET['tampil'] == 'berandaa'){ echo "active"; }?>">
    <a href="?tampil=berandaa">
      <i class="fa fa-dashboard"></i> <span>Beranda</span>
    </a>
  </li>

  <li class="treeview <?php if ($_GET['tampil'] == 'karyawan' || $_GET['tampil'] == 'vendor'
                                || $_GET['tampil'] == 'karyawan_edit' || $_GET['tampil'] == 'vendor_edit'
                                || $_GET['tampil'] == 'karyawan_editpro' || $_GET['tampil'] == 'vendor_editpro'
                                || $_GET['tampil'] == 'karyawan_hapus' || $_GET['tampil'] == 'vendor_hapus'
                                || $_GET['tampil'] == 'pesan' || $_GET['tampil'] == 'kontrak_vendor')
                                { echo "active"; }?>">
    <a href="#">
      <i class="fa fa-cog"></i> <span>Manajemen</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="<?php if ($_GET['tampil'] == 'karyawan' || $_GET['tampil'] == 'karyawan_edit'
                           || $_GET['tampil'] == 'karyawan_hapus' || $_GET['tampil'] == 'karyawan_editpro'){echo "active";} ?>">
        <a href="?tampil=karyawan">
          <i class="fa fa-users"></i> Karyawan
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'vendor' || $_GET['tampil'] == 'vendor_edit'
                          || $_GET['tampil'] == 'vendor_hapus' || $_GET['tampil'] == 'vendor_editpro'){echo "active";} ?>">
        <a href="?tampil=vendor">
          <i class="fa fa-code-fork"></i> Vendor
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'pesan'){echo "active";} ?>">
        <a href="?tampil=pesan">
          <i class="fa fa-commenting"></i> Pesan
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $hitpesan; ?></small>
            </span>
        </a>
      </li>
      <li class="<?php if ($_GET['tampil'] == 'kontrak_vendor'){ echo "active"; }?>">
        <a href="?tampil=kontrak_vendor">
          <i class="fa fa-suitcase"></i> <span>Kontrak</span>
        </a>
      </li>
    </ul>

  </li>

  <?php } ?>

  <?php if ($data['id_role'] == 3) { ?>

  <li class="<?php if ($_GET['tampil'] == 'report_vendor'){ echo "active"; }?>">
    <a href="?tampil=report_vendor">
      <i class="fa fa-bar-chart"></i> <span>Report Vendor</span>
    </a>
  </li>

  <?php } ?>

</ul>
