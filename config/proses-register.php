<?php
include "koneksi.php";

if (isset($_POST['register'])) {

    $panggilan  = mysqli_real_escape_string($con, $_POST['panggilan']);
    $id_line    = mysqli_real_escape_string($con, $_POST['id_line']);
    $email      = mysqli_real_escape_string($con, $_POST['email']);
    $password   = mysqli_real_escape_string($con, $_POST['password']);

    $register   = "INSERT INTO `accounts`(`email`, `panggilan`, `passwords`, `status`, `stats_daftar`) 
                                        VALUES ('$email', '$panggilan', PASSWORD('$password'), 0, 0);";
    $register   .= "INSERT INTO `berkas` (`email`) VALUES ('$email');";
    $register   .= "INSERT INTO `biodata` (`email`) VALUES ('$email');";
    $register   .= "INSERT INTO `contacts` (`id_line`, `email`) VALUES ('$id_line', '$email');";
    $register   .= "INSERT INTO `data_studi` (`email`) VALUES ('$email');";
    $register   .= "INSERT INTO `fasilitas_skills` (`email`) VALUES ('$email');";
    $register   .= "INSERT INTO `minat_kegiatan` (`email`) VALUES ('$email');";
    $register   .= "INSERT INTO `pilihan_bidang` (`email`) VALUES ('$email')";

    $queries = mysqli_multi_query($con, $register);

    if ($queries) {
        echo "<script>alert('Berhasil mendaftar, silakan login '); 
            location.href='../login/' </script>";
    } else {
        echo "<script>alert('Gagal mendaftar, maaf email telah terdaftar '); 
            location.href='../register/' </script>";
    }
}
