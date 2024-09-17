<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(isset($_POST['update_data_studi'])) {

        $npm = mysqli_real_escape_string($con, $_POST['npm']);
        $kelas = mysqli_real_escape_string($con, $_POST['kelas']);
        $jurusan = mysqli_real_escape_string($con, $_POST['jurusan']);
        $domisili = mysqli_real_escape_string($con, $_POST['domisili']);
        
        $update_data_studi = mysqli_query($con, "UPDATE `data_studi` 
                                            SET 
                                            `npm`= '$npm',
                                            `kelas`= '$kelas',
                                            `jurusan`= '$jurusan',
                                            `domisili`= '$domisili'
                                            WHERE `email` = '$email' ");
        if ($update_data_studi) {
            echo"<script>alert('Data studi berhasil di update');
                location.href='../pages/berkas/Data_Studi/';</script>";
        }else{
            echo"<script>alert('Data studi gagal di update, NPM sudah terdaftar');
                location.href='../pages/berkas/Data_Studi/';</script>";
        }

    }

?>