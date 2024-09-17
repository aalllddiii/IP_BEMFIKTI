<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['update_kontak'])) {

        $id_line = mysqli_real_escape_string($con, $_POST['id_line']);
        $instagram = mysqli_real_escape_string($con, $_POST['instagram']);
        $no_telp = mysqli_real_escape_string($con, $_POST['no_telp']);
        $no_telp_ortu = mysqli_real_escape_string($con, $_POST['no_telp_ortu']);
        
        $update_kontak = mysqli_query($con, "UPDATE `contacts` 
                                            SET 
                                            `id_line`= '$id_line',
                                            `instagram`= '$instagram',
                                            `no_telp`= '$no_telp',
                                            `no_telp_ortu`= '$no_telp_ortu'
                                            WHERE `email` = '$email' ");
        if ($update_kontak) {
            echo"<script>alert('Kontak berhasil di update');
                location.href='../pages/berkas/Kontak/';</script>";
        }else{
            echo"<script>alert('Kontak gagal di update');
                location.href='../pages/berkas/Kontak/';</script>";
        }

    }

?>