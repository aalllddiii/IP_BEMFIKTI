<?php
require("koneksi.php");

function hapusPendaftar($id){
    global $conn;
    $email = $_GET['email'];
    $hapus = $_GET['hapus'];
    
    if($hapus == 1){
        $query  = "DELETE FROM accounts WHERE email = '$email' ;";
        $query .= "DELETE FROM berkas WHERE email = '$email' ;";
        $query .= "DELETE FROM biodata WHERE email = '$email' ;";
        $query .= "DELETE FROM contacts WHERE email = '$email' ;";
        $query .= "DELETE FROM data_studi WHERE email = '$email' ;";
        $query .= "DELETE FROM fasilitas_skills WHERE email = '$email' ;";
        $query .= "DELETE FROM minat_kegiatan WHERE email = '$email' ;";
        $query .= "DELETE FROM pilihan_bidang WHERE email = '$email' ;";
        $query .= "DELETE FROM riwayat_organisasi WHERE email = '$email' ";
        
        $check = mysqli_multi_query($conn, $query);
        
    }
    
    return mysqli_affected_rows($conn);
}

function seleksiFinal($id){
    global $conn;
    
    $email = $_GET['email'];
    $status = $_GET['seleksi1'];

    $result = mysqli_query($conn,"UPDATE accounts SET `status` = '$status' WHERE email = '$email'"); 

    return mysqli_affected_rows($conn);
}


function statusDaftar($data){
    global $conn;

    $stats_daftar = htmlspecialchars($data["stats_daftar"]);

    $query = "UPDATE accounts SET stats_daftar = '$stats_daftar' " ;
    $result = mysqli_query($conn,$query);
    //vardump($result);die;
    
    return mysqli_affected_rows($conn);
}


function tutupPsikotest($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline_psikotest"]);

    $query = "UPDATE users_account SET deadline_psikotest = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    //vardump($result);die;
    
    return mysqli_affected_rows($conn);
}


function bukaPsikotest($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline_psikotest"]);

    $query = "UPDATE users_account SET deadline_psikotest = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function tambahEsport($data){
    global $conn;

    $nama_esport = htmlspecialchars($data["nama_esport"]);

    $query = "INSERT INTO esport (id_esport, nama_esport) VALUES ('','$nama_esport')" ;
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapusEsport($id){
    global $conn;
    $id_esport = $_GET["id_esport"];
    $result = mysqli_query($conn, "DELETE FROM esport WHERE id_esport = '$id_esport'");
    return mysqli_affected_rows($conn);
}



?>  