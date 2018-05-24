<?php

  include "../../lib/koneksi.php";
  
  $id = $_POST['id'];

    $link_report = addslashes($_POST['link']);
    
	$laporan = mysqli_query($koneksi, "INSERT INTO report_vendor SET
                            id_vendor      ='$_POST[id_vendor]',
                            id_kontrak     ='$_POST[id_kontrak]',
                            id_varkontrak  ='$id',
                            tahun          ='$_POST[tahun]',
                            id_bulan       ='$_POST[bulan]',
                            link_report    ='$link_report',
                            sla            ='$_POST[sla]',
                            performance    ='$_POST[perform]'");

	header('location:../../?tampil=report_vendor');

<<<<<<< HEAD
?>
=======
              $link = addslashes($_POST['link']);
            
                $input  = mysqli_query($koneksi, "INSERT INTO report_vendor SET
                        id_vendor         = '$_POST[id]',
                        id_kontrak        = '$_POST[kontrak]',
                        id_varkontrak     = '$_POST[varian]',
                        tahun             = '$_POST[tahun]',
                        id_bulan          = '$_POST[bulan]',
                        link_report       = '$link',
                        sla               = '$_POST[sla]',
                        performance       = '$_POST[perform]'
                        ")  or die (mysqli_error($koneksi));
              
              if ($input){ ?>
                <div class="callout callout-success">
                  <p>Data report berhasil ditambahkan <span class="fa fa-check"></span></p> 
                  <?php echo "<meta http-equiv='refresh' content='1;
                  url=?tampil=report_vendor'>"; ?>
                </div>
            <?php } } ?>
        </div>
      </div>
    </div>
  </div>
</section>
>>>>>>> 6c00d997b69bf6acaf61ae1eb5819db8fd76398c

