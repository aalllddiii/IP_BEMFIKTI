<?php
    session_start();
    include "../../../config/koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);
    if (isset($_POST['upload_foto']) ){

        $nomor_acak = round(microtime(true));
        $foto = $_FILES['foto_non_formal']['name'];
        $tipe_foto = $_FILES['foto_non_formal']['type'];
        $file_tmp = $_FILES['foto_non_formal']['tmp_name'];
        
        $foto_baru = $nomor_acak. '_' .$foto;
    	
    	$a = mysqli_query($con, "SELECT foto_non_formal FROM biodata WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        $folder = "../../requirement/foto_bebas/$cek[foto_non_formal]";
    	($folder);
        $file =mysqli_query($con, "SELECT foto_non_formal FROM biodata WHERE email='$email' "); 
    	
        if($tipe_foto == "image/jpeg" || $tipe_foto == "image/png" || $tipe_foto == "image/jpg"){
    	    
    	    $update = mysqli_query($con, "UPDATE biodata SET foto_non_formal='$foto_baru' WHERE email='$email' ");
        
            @move_uploaded_file($file_tmp, "../../requirement/foto_bebas/".$foto_baru);
    
            if ($update){
    			echo"<script>alert('Foto Berhasil Di Ubah');
                location.href='../pages/berkas/Biodata/';</script>";
    		}else{
                echo"<script>alert('Foto Gagal Di Ubah');
                location.href='../pages/berkas/Biodata/';</script>";
            }
        }else{
            echo"<script>alert('Maaf format file berkas selain JPG/JPEG/PNG tidak di dukung');
                location.href='../pages/berkas/Biodata/';</script>";
        }

    }else if(isset($_POST['update_biodata'])) {

        $nama_lengkap = mysqli_real_escape_string($con, $_POST['nama_lengkap']);
        $ttl = mysqli_real_escape_string($con, $_POST['ttl']);
        $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
        $motto = mysqli_real_escape_string($con, $_POST['motto']);
        $satu_kata = mysqli_real_escape_string($con, $_POST['satu_kata']);
        $deskripsi_diri = mysqli_real_escape_string($con, $_POST['deskripsi_diri']);

        $update_biodata = mysqli_query($con, "UPDATE `biodata` 
                                            SET 
                                            `nama_lengkap`= '$nama_lengkap',
                                            `ttl`= '$ttl',
                                            `alamat`= '$alamat',
                                            `motto`= '$motto',
                                            `satu_kata`= '$satu_kata',
                                            `deskripsi_diri`= '$deskripsi_diri'
                                            WHERE `email` = '$email' ");
        if ($update_biodata) {
            echo"<script>alert('Biodata berhasil di update');
                location.href='../pages/berkas/Biodata/';</script>";
        }else{
            echo"<script>alert('Biodata gagal di update');
                location.href='../pages/berkas/Biodata/';</script>";
        }

    }

?>