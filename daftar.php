<?php include("koneksi_ok.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Anfra - Daftar</title>
        <link rel="stylesheet" href="daftar.css">
    </head>
    <body>
        <div id="container" class="card">
            <form action="proses-daftar.php" method="POST">
                <h1>Pendaftaran Calon Istri</h1>
                <p>Kalau Sudah Daftar Jangan Menyesal, ya :)</p>
                <table align="center" class="table-new">
                    <tr>
                        <td><label for="ktp">No. KTP</label></td>
                        <td>:</td>
                        <td><input type="number" min="10000000000000" max="9999999999999999" name="ktp" class="input-content"></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama Kamu</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="input-content"></td>
                    </tr>
                    <tr>
                        <td><label for="pekerjaan">Pekerjaanmu</label></td>
                        <td>:</td>
                        <td>
                            <select name="pekerjaan" class="input-content">
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
                        <td><input type="email" name="email" class="input-content"></td>
                    </tr>
                    <tr>
                        <td><label for="telepon">No HP</label></td>
                        <td>:</td>
                        <td><input type="number" name="telepon" class="input-content"></td>
                    </tr>
                    <tr>
                        <td>Suka sama aku gak</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="suka" value="Iya">
                            <label for="suka">Iya</label>
                            <input type="radio" name="suka" value="Tidak">
                            <label for="suka">Tidak</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alasan">Alasannya</label></td>
                        <td>:</td>
                        <td><input type="alasan" name="alasan" class="input-content"></td>
                    </tr>
                </table>
                <button name="daftar">Kirim !</button>
            </form>
        <center>
        <hr>
            <h2>Daftar Rekomendasi Calon Istri</h2>
            <table align="center" class="table-border" border="3px" cellspacing="0" cellpadding="5">
                <tr>
                    <th>No. KTP</th>
                    <th>Nama Kamu</th>
                    <th>Pekerjaanmu</th>
                    <th>E-mail</th>
                    <th>Telepon</th>
                    <th>Suka ?</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM calon_istri";
                    $query = mysqli_query($conn, $sql);
                    while($calon_istri = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>".$calon_istri['ktp']."</td>";
                        echo "<td>".$calon_istri['nama']."</td>";
                        echo "<td>".$calon_istri['pekerjaan']."</td>";
                        echo "<td>".$calon_istri['email']."</td>";
                        echo "<td>".$calon_istri['telepon']."</td>";
                        echo "<td>".$calon_istri['suka']."</td>";
                        echo "<td>".$calon_istri['alasan']."</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=".$calon_istri['id']."'>Edit</a> | ";
                        echo "<a href='delete.php?id=".$calon_istri['id']."'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
        </div>
    </body>
</html>