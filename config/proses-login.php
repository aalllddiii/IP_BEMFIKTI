<?php 
    session_start();
    include "koneksi.php";
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = mysqli_query($con, "SELECT accounts.*, biodata.* 
                               FROM accounts 
                               JOIN biodata ON accounts.email = biodata.email
                               WHERE accounts.email = '$email' AND accounts.passwords = PASSWORD('$password') ");

    $cek = mysqli_num_rows($sql);
    $data = mysqli_fetch_array($sql);

    if ($cek > 0) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['panggilan'] = $data['panggilan'];

        echo "<script>alert('Berhasil Login, Selamat datang $_SESSION[panggilan] '); 
            location.href='../Has-Login/users/' </script>";
    }else{
        echo "<script>alert('Gagal login, akun tidak ditemukan '); 
            location.href='../login/' </script>";
    }

?>