<?php

// jalur data yang disorting
$user = $_SESSION['username'];
$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan 
                                    JOIN role_login ON karyawan.id_role=role_login.id_role
                                    WHERE karyawan.username='$user'");
$arr = mysqli_fetch_array($karyawan);
$hit1 = mysqli_num_rows($karyawan);

if ($hit1 > 0){
    $data=$arr;
} else {
$vendor = mysqli_query($koneksi, "SELECT * FROM master_vendor
                                  JOIN role_login ON master_vendor.id_role=role_login.id_role
                                  WHERE master_vendor.username='$user'");
$arr = mysqli_fetch_array($vendor);
$data=$arr;
}
//--------------------------------------------------------------------------------------------------------

//--------------- path image, nama ---------------
if ($data['id_role'] == 1 || $data['id_role'] == 2 ){
    $img = "data/img/karyawan/$data[img]";
    $id = $data['nip'];
    $nama = $data['nama_karyawan'];
    $unit = $data['unit'];
    $email = $data['email'];
    $contact = $data['contact'];
    $user = $data['username'];
    $role = $data['id_role'];
    $status = "<a class='btn btn-default btn-xs'><i class='fa fa-user'></i> $data[status]</a>";
} else {
    $img = "data/img/vendor/$data[img]";
    $id = $data['id_vendor'];
    $nama = $data['nama_perusahaan'];
    $email = $data['email_vendor'];
    $alamat = $data['alamat_vendor'];
    $contact = $data['contact_vendor'];
    $user = $data['username'];
    $role = $data['id_role'];
    $status = "<a class='btn btn-default btn-xs'><i class='fa fa-code-fork'></i> $data[status]</a>";
}

$pesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE jawaban IS NULL");
$hitpesan = mysqli_num_rows($pesan);

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
  $no++;
}}

//-------------------------- Ambil Bulan ----------------------------
function bulan_mulai($bm){
  if ($bm == 1) {echo "Januari";} else if ($bm == 2) {echo "Februari";} else if ($bm == 3) {echo "Maret";}
  else if ($bm == 4) {echo "April";} else if ($bm == 5) {echo "Mei";} else if ($bm == 6) {echo "Juni";}
  else if ($bm == 7) {echo "Juli";} else if ($bm == 8) {echo "Agustus";} else if ($bm == 9) {echo "September";}
  else if ($bm == 10) {echo "Oktober";} else if ($bm == 11) {echo "November";} else if ($bm == 12) {echo "Desember";}
}

function bulan_selesai($bs){
  if ($bs == 1) {echo "Januari";} else if ($bs == 2) {echo "Februari";} else if ($bs == 3) {echo "Maret";}
  else if ($bs == 4) {echo "April";} else if ($bs == 5) {echo "Mei";} else if ($bs == 6) {echo "Juni";}
  else if ($bs == 7) {echo "Juli";} else if ($bs == 8) {echo "Agustus";} else if ($bs == 9) {echo "September";}
  else if ($bs == 10) {echo "Oktober";} else if ($bs == 11) {echo "November";} else if ($bs == 12) {echo "Desember";}
}

?>
<ul class="nav navbar-nav">

    <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $img; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Hey, <?php echo strtoupper($user); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $img; ?>" class="img-circle" alt="User Image">
                <p><?php echo $nama; ?></p>
                <p><?php echo $status; ?></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?tampil=profil" class="btn btn-default btn-flat">
                    <span class="fa fa-cog"></span> 
                    Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?tampil=logout" class="btn btn-default btn-flat">
                    <span class="fa fa-sign-out"></span>
                    Sign out</a>
                </div>
              </li>
            </ul>
    </li>

</ul>