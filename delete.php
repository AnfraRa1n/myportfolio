<?php
    include("koneksi_ok.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM calon_istri WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('Location: daftar.php?pesan=lupakan');
        }else{
            die('Gagal Melupakan');
        }
    }else{
        die('Akses Ditolak');
    }
?>