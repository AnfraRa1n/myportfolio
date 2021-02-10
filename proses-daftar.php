<?php 
    include("koneksi_ok.php");
    
    // Cek apakah tombol daftar sudah diklik atau belum
    if(isset($_POST['daftar'])){
        
        // Ambil data dari formulir
        $ktp = $_POST['ktp'];
        $nama = $_POST['nama'];
        $pekerjaan = $_POST['pekerjaan'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $suka = $_POST['suka'];
        $alasan = $_POST['alasan'];
        
        // Buat query
        $sql = "INSERT INTO calon_istri (ktp, nama, pekerjaan, email, telepon, suka, alasan) VALUE ('$ktp','$nama', '$pekerjaan','$email','$telepon','$suka','$alasan')";
        $query = mysqli_query($conn, $sql);
        
        // Apakah query berhasil disimpan?
        if($query){
            header('Location: daftar.php?status=diterima');
        }else{
            header('Location: daftar.php?status=ditolak');
        }
    }else{
        die("Akses Ditolak mentah-mentah");
    }
?>