<?php
    session_start();
    include "../../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (!isset($_SESSION['email']) > 0) {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../../login/';</script>";
    }

?>