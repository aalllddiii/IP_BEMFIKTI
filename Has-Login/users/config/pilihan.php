<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['update_pilihan'])) {

        $pilihan_satu = mysqli_real_escape_string($con, $_POST['pilihan_satu']);
        $pilihan_dua = mysqli_real_escape_string($con, $_POST['pilihan_dua']);
        $alasan_pilih_satu = mysqli_real_escape_string($con, $_POST['alasan_pilih_satu']);
        $alasan_pilih_dua = mysqli_real_escape_string($con, $_POST['alasan_pilih_dua']);
        $alasan_ikut = mysqli_real_escape_string($con, $_POST['alasan_ikut']);
        $harapan = mysqli_real_escape_string($con, $_POST['harapan']);
        
        $update_pilihan = mysqli_query($con, "UPDATE `pilihan_bidang` 
                                              SET `pilihan_satu`= '$pilihan_satu',
                                                  `pilihan_dua`= '$pilihan_dua',
                                                  `alasan_pilih_satu`= '$alasan_pilih_satu',
                                                  `alasan_pilih_dua`= '$alasan_pilih_dua',
                                                  `alasan_ikut`= '$alasan_ikut',
                                                  `harapan`= '$harapan'
                                                  WHERE `email`= '$email' ");
        if ($update_pilihan) {
            echo"<script>alert('Pilihan berhasil di update');
                location.href='../pages/berkas/Pilihan/';</script>";
        }else{
            echo"<script>alert('Pilihan gagal di update);
                location.href='../pages/berkas/Pilihan/';</script>";
        }

    }

?>