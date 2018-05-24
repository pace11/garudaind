<section class="content">
<div class="row">

  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><b>Kontrak</b> | Tambah</h3>
      </div>

        <div class="box-body">

          <?php
            if (isset($_POST['simpan'])){
            
            $tahun = date_create($_POST['bulan_mulai']);
            $ntahun = date_format($tahun,"Y");
            $bulan_mulai = date_create($_POST['bulan_mulai']);
            $nbulan_mulai = date_format($bulan_mulai,"m");
            $bulan_selesai = date_create($_POST['bulan_selesai']);
            $nbulan_selesai = date_format($bulan_selesai,"m");


            $input  = mysqli_query($koneksi, "INSERT INTO varian_kontrak SET
                  type_varian       = '$_POST[nama_kontrak]',
                  id_kontrak        = '$_POST[jenis_kontrak]',
                  tahun             = '$ntahun',
                  bulan_mulai       = '$nbulan_mulai',
                  bulan_selesai     = '$nbulan_selesai',
                  sla               = '$_POST[sla]',
                  id_vendor         = '$_POST[vendor]'  
                  ")  or die (mysqli_error($koneksi));

            if ($input){ ?>
                <div class="callout callout-success">
                  <p>Data kontrak berhasil disimpan <span class="fa fa-check"></span></p> 
                  <?php echo "<meta http-equiv='refresh' content='1;
                  url=?tampil=kontrak_vendor'>"; ?>
                </div>
            <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</section>
