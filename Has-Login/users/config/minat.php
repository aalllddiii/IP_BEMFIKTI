<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['update_minat'])) {

        $akademik = mysqli_real_escape_string($con, implode(',', $_POST['akademik']) );
        $kesenian = mysqli_real_escape_string($con, implode(',', $_POST['kesenian']) );
        $olahraga = mysqli_real_escape_string($con, implode(',', $_POST['olahraga']) );
        $media_kreatif = mysqli_real_escape_string($con, implode(',', $_POST['media_kreatif']) );
        
        $update_minat = mysqli_query($con, "UPDATE `minat_kegiatan` 
                                            SET 
                                            `akademik`= '$akademik',
                                            `kesenian`= '$kesenian',
                                            `olahraga`= '$olahraga',
                                            `media_kreatif`= '$media_kreatif'
                                            WHERE `email` = '$email' ");
        if ($update_minat) {
            echo"<script>alert('Data peminatan berhasil di update');
                location.href='../pages/berkas/Minat/';</script>";
        }else{
            echo"<script>alert('Data peminatan gagal di update');
                location.href='../pages/berkas/Minat/';</script>";
        }

    }

?>