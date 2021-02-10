<?php
    include("koneksi_ok.php");
    // Cek apakah tombol simpan sudah diklik atau belum?
    if(isset($_POST['simpan'])){
        // ambil data dari formulir
        $id = $_POST['id'];
        $ktp = $_POST['ktp'];
        $nama = $_POST['nama'];
        $pekerjaan = $_POST['pekerjaan'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $suka = $_POST['suka'];
        $alasan = $_POST['alasan'];

        // buat query update
        $sql = "UPDATE calon_istri SET ktp='$ktp', nama='$nama', email='$email', pekerjaan='$pekerjaan', telepon='$telepon', suka='$suka', alasan='$alasan' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // cek update berhasil?
        if($query){
            header('Location: daftar.php');
        }else{
            die("Gagal Memiliki Calon Istri");
        }
    }else{
        die("Akses Ditolak");
    }
?>