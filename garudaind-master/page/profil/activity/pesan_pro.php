<?php

    include "../../../lib/koneksi.php";

    if (isset($_POST['simpan'])){
    
    $role = $_POST['role'];
    $date = date("Y-m-d");
    $isi = addslashes($_POST['isi_pesan']);

        if ($role == 1 || $role == 2){
            $input  = mysqli_query($koneksi, "INSERT INTO pesan SET
                subjek        = '$_POST[subjek]',
                isi           = '$isi',
                jawaban       = NULL,
                nip           = '$_POST[id]',
                id_vendor     = NULL,
                created_at    = '$date' 
                ")  or die (mysqli_error($koneksi));
        } else {
            $input  = mysqli_query($koneksi, "INSERT INTO pesan SET
                subjek        = '$_POST[subjek]',
                isi           = '$isi',
                jawaban       = NULL,
                nip           = NULL,
                id_vendor     = '$_POST[id]',
                created_at    = '$date' 
                ")  or die (mysqli_error($koneksi));
        }
        
    if ($input){
        header('location:../../../?tampil=profil');
        }
    }
?>