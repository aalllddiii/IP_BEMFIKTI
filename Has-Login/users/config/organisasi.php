<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['submit'])) {

        $nama_organisasi = mysqli_real_escape_string($con, $_POST['nama_organisasi']);
        $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);
        $periode = mysqli_real_escape_string($con, $_POST['periode']);
        
        $update_kontak = mysqli_query($con, 
        "INSERT INTO `riwayat_organisasi`(`nama_organisasi`, `jabatan`, `periode`, `email`) 
         VALUES ('$nama_organisasi', '$jabatan', '$periode', '$email' ) ");
        if ($update_kontak) {
            echo"<script>alert(' berhasil di update');
                location.href='../pages/berkas/Riwayat_Organisasi/';</script>";
        }else{
            echo"<script>alert('Riwayat organisasi gagal di update');
                location.href='../pages/berkas/Riwayat_Organisasi/';</script>";
        }

    }

?>