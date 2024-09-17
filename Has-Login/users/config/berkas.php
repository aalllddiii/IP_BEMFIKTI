<?php
    session_start();
    include "../../../config/koneksi.php";
    
    // VARIABEL GLOBAL
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // UPLOAD KRS
    if (isset($_POST['upload_krs'])) {
        $krs = $_FILES['krs']['name'];
        $ukuran_krs = $_FILES['krs']['size'];
        $tipe_file_krs = $_FILES['krs']['type'];
        $file_tmp_krs = $_FILES['krs']['tmp_name'];
        
        $a = mysqli_query($con, "SELECT krs FROM `berkas` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        if ($cek['krs'] != NULL) {
            $folder = "../../requirement/krs/$cek[krs]";
            unlink($folder);
            $del=mysqli_query($con, "DELETE krs FROM `berkas` WHERE email='$email' ");
            
            if ($ukuran_krs < 1000000) {
                if($tipe_file_krs == "application/pdf"){
                    $update_krs = mysqli_query($con, "UPDATE `berkas` SET `krs`= '$krs' WHERE email = '$email' ");
                    @move_uploaded_file($file_tmp_krs, "../../requirement/krs/".$krs);
                
                    if ($update_krs) {
                        echo"<script>alert('KRS berhasil upload');
                        location.href='../pages/berkas/Berkas-berkas/';</script>";
                    }else{
                        echo"<script>alert('KRS gagal di upload');
                        location.href='../pages/berkas/Berkas-berkas/';</script>";
                    }
                }else{
                    echo"<script>alert('Maaf format file KRS selain pdf tidak di dukung');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else {
                echo "ukuran melebihi 1mb tidak bisa upload";
            }
        }else {
            if($tipe_file_krs == "application/pdf"){
                $update_krs = mysqli_query($con, "UPDATE `berkas` SET `krs`= '$krs' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_krs, "../../requirement/krs/".$krs);
            
                if ($update_krs) {
                    echo"<script>alert('KRS berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('KRS gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file KRS selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }   
        }
    }
    // UPLOAD FILE RANGKUMAN NILAI
    else if(isset($_POST['upload_rangkuman_nilai'])) {
        $nomor_acak = round(microtime(true));
        $rangkuman_nilai = $_FILES['rangkuman_nilai']['name'];
        $tipe_file_rangkuman_nilai = $_FILES['rangkuman_nilai']['type'];
        $file_tmp_rangkuman_nilai = $_FILES['rangkuman_nilai']['tmp_name'];
        
        $rangkuman_nilai_baru = $nomor_acak. '_' .$rangkuman_nilai;
        $a = mysqli_query($con, "SELECT rangkuman_nilai FROM `berkas` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        if ($cek['rangkuman_nilai'] != NULL) {
            $folder = "../../requirement/rangkuman_nilai/$cek[rangkuman_nilai]";
            unlink($folder);
            $del=mysqli_query($con, "DELETE rangkuman_nilai FROM `berkas` WHERE email='$email' ");
            
            if($tipe_file_rangkuman_nilai == "application/pdf"){
                $update_rangkuman_nilai = mysqli_query($con, "UPDATE `berkas` SET `rangkuman_nilai`= '$rangkuman_nilai_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_rangkuman_nilai, "../../requirement/rangkuman_nilai/".$rangkuman_nilai_baru);
            
                if ($update_rangkuman_nilai) {
                    echo"<script>alert('rangkuman_nilai berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('rangkuman_nilai gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file rangkuman_nilai selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }
        }else {
            if($tipe_file_rangkuman_nilai == "application/pdf"){
                $update_rangkuman_nilai = mysqli_query($con, "UPDATE `berkas` SET `rangkuman_nilai`= '$rangkuman_nilai_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_rangkuman_nilai, "../../requirement/rangkuman_nilai/".$rangkuman_nilai_baru);
            
                if ($update_rangkuman_nilai) {
                    echo"<script>alert('Rangkuman Nilai berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('Rangkuman Nilai gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file Rangkuman Nilai selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }   
        }
    }
    // UPLOAD FOTO FORMAL
    else if(isset($_POST['upload_foto_formal'])) {
        $nomor_acak = round(microtime(true));
        $foto_formal = $_FILES['foto_formal']['name'];
        $tipe_file_foto_formal = $_FILES['foto_formal']['type'];
        $file_tmp_foto_formal = $_FILES['foto_formal']['tmp_name'];
        
        $foto_formal_baru = $nomor_acak. '_' .$foto_formal;
        $a = mysqli_query($con, "SELECT foto_formal FROM `berkas` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        if ($cek['foto_formal'] != NULL) {
            $folder = "../../requirement/foto_formal/$cek[foto_formal]";
            unlink($folder);
            $del=mysqli_query($con, "DELETE foto_formal FROM `berkas` WHERE email='$email' ");
            
            if($tipe_file_foto_formal == "image/jpeg" || $tipe_file_foto_formal == "image/png" || $tipe_file_foto_formal == "image/jpg"){
                $update_foto_formal = mysqli_query($con, "UPDATE `berkas` SET `foto_formal`= '$foto_formal_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_foto_formal, "../../requirement/foto_formal/".$foto_formal_baru);
            
                if ($update_foto_formal) {
                    echo"<script>alert('foto_formal berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('foto_formal gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file foto formal selain PNG/JPG/JPEG tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }
        }else {
            if($tipe_file_foto_formal == "image/jpeg" || $tipe_file_foto_formal == "image/png" || $tipe_file_foto_formal == "image/jpg"){
                $update_foto_formal = mysqli_query($con, "UPDATE `berkas` SET `foto_formal`= '$foto_formal_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_foto_formal, "../../requirement/foto_formal/".$foto_formal_baru);
            
                if ($update_foto_formal) {
                    echo"<script>alert('Foto formal berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('Foto formal gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file Foto formal selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }   
        }
    }
    // UPLOAD SURAT PERNYATAAN
    else if(isset($_POST['upload_surat_pernyataan'])) {
        $nomor_acak = round(microtime(true));
        $surat_pernyataan = $_FILES['surat_pernyataan']['name'];
        $tipe_file_surat_pernyataan = $_FILES['surat_pernyataan']['type'];
        $file_tmp_surat_pernyataan = $_FILES['surat_pernyataan']['tmp_name'];
        
        $surat_pernyataan_baru = $nomor_acak. '_' .$surat_pernyataan;
        $a = mysqli_query($con, "SELECT surat_pernyataan FROM `berkas` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        if ($cek['surat_pernyataan'] != NULL) {
            $folder = "../../requirement/surat_pernyataan/$cek[surat_pernyataan]";
            unlink($folder);
            $del=mysqli_query($con, "DELETE surat_pernyataan FROM `berkas` WHERE email='$email' ");
            
            if($tipe_file_surat_pernyataan == "application/pdf"){
                $update_surat_pernyataan = mysqli_query($con, "UPDATE `berkas` SET `surat_pernyataan`= '$surat_pernyataan_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_surat_pernyataan, "../../requirement/surat_pernyataan/".$surat_pernyataan_baru);
            
                if ($update_surat_pernyataan) {
                    echo"<script>alert('surat_pernyataan berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('surat_pernyataan gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file surat_pernyataan selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }
        }else {
            if($tipe_file_surat_pernyataan == "application/pdf"){
                $update_surat_pernyataan = mysqli_query($con, "UPDATE `berkas` SET `surat_pernyataan`= '$surat_pernyataan_baru' WHERE email = '$email' ");
                @move_uploaded_file($file_tmp_surat_pernyataan, "../../requirement/surat_pernyataan/".$surat_pernyataan_baru);
            
                if ($update_surat_pernyataan) {
                    echo"<script>alert('Surat Pernyataan berhasil upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }else{
                    echo"<script>alert('Surat Pernyataan gagal di upload');
                    location.href='../pages/berkas/Berkas-berkas/';</script>";
                }
            }else{
                echo"<script>alert('Maaf format file Surat Pernyataan selain pdf tidak di dukung');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
            }   
        }
    }
    // PORTOFOLIO
    elseif (isset($_POST['upload_portofolio'])) {
        
        $portofolio = mysqli_real_escape_string($con, $_POST['portofolio']);
        $update_portofolio = mysqli_query($con, "UPDATE `berkas` 
                                            SET 
                                            `portofolio`= '$portofolio'
                                            WHERE `email` = '$email' ");
        if ($update_portofolio) {
            echo"<script>alert('Portofolio berhasil di update');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
        }else{
            echo"<script>alert('Portofolio gagal di update');
                location.href='../pages/berkas/Berkas-berkas/';</script>";
        }
    }

?>