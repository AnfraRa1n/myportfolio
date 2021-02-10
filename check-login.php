<?php
    session_start(); // Start session nya

    include "koneksi.php"; // Load file koneksi.php

    $namakamu = mysqli_real_escape_string($connect, $_POST['namakamu']); // Ambil value namakamu yang dikirim dari form
    $katakunci = mysqli_real_escape_string($connect, $_POST['katakunci']); // Ambil value katakunci yang dikirim dari form

    // Buat query untuk mengecek apakah ada data user dengan namakamu dan katakunci yang dikirim dari form
    $sql = mysqli_query($connect, "SELECT * FROM user WHERE namakamu='".$namakamu."' AND katakunci='".$katakunci."'");
    $data = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

    // Cek apakah variabel $data ada datanya atau tidak
    if(!empty($data)){ // Jika tidak sama dengan empty (kosong)
        $_SESSION['namakamu'] = $data['namakamu']; // Set session untuk namakamu (simpan namakamu di session)
        $_SESSION['nama'] = $data['nama']; // Set session untuk nama (simpan nama di session)
        
        setcookie("message","delete",time()-1); // Kita delete cookie message
        
        header("location: home.php"); // Kita redirect ke halaman welcome.php
    }else{ // Jika $data nya kosong
        // Buat sebuah cookie untuk menampung data pesan kesalahan
        setcookie("message", "Maaf, namakamu atau katakunci salah", time()+3600);
        
        header("location: form-login.php"); // Redirect kembali ke halaman index.php
    }
?>