<?php

include("../../lib/koneksi.php");

if (isset($_GET['kontrak']) != "") {
  $kontrak = $_GET['kontrak'];
} else {
  $kontrak = $_GET['kontrak2'];
}

$sql_kontrak = mysqli_query($koneksi, "SELECT * FROM varian_kontrak WHERE id_kontrak='$kontrak'");

echo "<option>-- pilih salah satu --</option>";

while($row_kontrak = mysqli_fetch_array($sql_kontrak)){
  echo "<option value=$row_kontrak[id_varkontrak]>$row_kontrak[type_varian]</option> \n";
}

?>
