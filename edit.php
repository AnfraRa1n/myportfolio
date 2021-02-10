<?php
    include("koneksi_ok.php");
    // Cek Query id
    if(!isset($_GET['id'])){
        header('Location: daftar.php');
    }
    // Ambil id dari query string
    $id = $_GET['id'];

    // Buat query untuk ambil data
    $sql = "SELECT * FROM calon_istri WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $calon_istri = mysqli_fetch_array($query);
    // Jika data yang diedit tidak ditemukan
    if(mysqli_num_rows($query) < 1){
        die("Calon Tidak Ditemukan");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Anfra - Daftar</title>
        <link rel="stylesheet" href="daftar.css">
    </head>
    <body>
        <div id="container" class="card">
            <form action="proses-edit.php" method="POST">
                <h1>Pendaftaran Calon Istri</h1>
                <p>Kalau Sudah Daftar Jangan Menyesal, ya :)</p>
                <table align="center">
                    <tr>
                        <td><label for="id">ID</label></td>
                        <td>:</td>
                        <td><input type="text" name="id" value="<?php echo $calon_istri['id'] ?>" class="input-content"></td>
                    </tr>
                    <tr>
                        <td><label for="ktp">No. KTP</label></td>
                        <td>:</td>
                        <td><input type="number" min="10000000000000" max="9999999999999999" name="ktp" class="input-content" value="<?php echo $calon_istri['ktp'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama Kamu</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="input-content" value="<?php echo $calon_istri['nama'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="pekerjaan">Pekerjaanmu</label></td>
                        <td>:</td>
                        <td>
                            <select name="pekerjaan" class="input-content" value="<?php echo $calon_istri['pekerjaan'] ?>">
                                <optgroup label="Pekerjaanmu">
                                    <option>Ibu Rumah Tangga</option>
                                    <option>Wanita Karir</option>
                                    <option>Akuntan</option>
                                    <option>Pengajar/Guru</option>
                                    <option>Wirausaha</option>
                                    <option>Pramugari</option>
                                    <option>Lain-lain...</option>
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td>:</td>
                        <td><input type="email" name="email" class="input-content" value="<?php echo $calon_istri['email'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="telepon">No HP</label></td>
                        <td>:</td>
                        <td><input type="number" name="telepon" class="input-content" value="<?php echo $calon_istri['telepon'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Suka sama aku gak</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="suka" value="suka" value="<?php echo $calon_istri['suka'] ?>">
                            <label for="suka">Iya</label>
                            <input type="radio" name="suka" value="tidak" value="<?php echo $calon_istri['suka'] ?>">
                            <label for="suka">Tidak</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alasan">Alasannya</label></td>
                        <td>:</td>
                        <td><input type="alasan" name="alasan" class="input-content" value="<?php echo $calon_istri['alasan'] ?>"></td>
                    </tr>
                </table>
                <button name="simpan">Simpan..an</button>
            </form>
        </div>
    </body>
</html>