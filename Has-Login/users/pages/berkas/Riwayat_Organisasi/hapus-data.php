<?php

include "../../../../../config/koneksi.php";

  $getid = $_SESSION['email'];

  $deletedata = mysqli_query($con,"DELETE FROM `riwayat_organisasi` WHERE email = '$_SESSION[email]' ");
  if ($deletedata){
     echo"<script>alert('data berhasil di hapus');
      location.href='../../../pages/berkas/Riwayat_Organisasi/'</script>";
  }else{
      echo"<script>alert('data gagal di hapus');
       location.href='../pages/berkas/Riwayat_Organisasi/'</script>";
  }
?>