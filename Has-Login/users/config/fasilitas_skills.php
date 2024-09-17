<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['update_fasilitas_skill'])) {

        $skill = mysqli_real_escape_string($con, $_POST['skill']);
        $fasilitas = mysqli_real_escape_string($con, implode(',', $_POST['fasilitas']) );
        
        
        $update_fasilitas_skill = mysqli_query($con, "UPDATE `fasilitas_skills` 
                                            SET 
                                            `fasilitas`= '$fasilitas',
                                            `skill`= '$skill'
                                            WHERE `email` = '$email' ");
        if ($update_fasilitas_skill) {
            echo"<script>alert('Data berhasil di update');
                location.href='../pages/berkas/Fasilitas_dan_Keahlian/';</script>";
        }else{
            echo"<script>alert('Data gagal di update');
                location.href='../pages/berkas/Fasilitas_dan_Keahlian/';</script>";
        }

    }

?>