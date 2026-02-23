<?php
session_start();
include "koneksi.php";

$nis = $_SESSION['nis'];

if(isset($_POST['kirim'])){

    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $ket = $_POST['keterangan'];

    mysqli_query($conn,"INSERT INTO aspirasi 
    (nis,id_kategori,lokasi,keterangan,status)
    VALUES('$nis','$kategori','$lokasi','$ket','Menunggu')");

    header("Location: siswa.php");
}
?>

<h2>Input Aspirasi</h2>

<form method="POST">
    Kategori:
    <select name="kategori">
        <?php
        $kat = mysqli_query($conn,"SELECT * FROM kategori");
        while($k = mysqli_fetch_array($kat)){
            echo "<option value='".$k['id_kategori']."'>".$k['ket_kategori']."</option>";
        }
        ?>
    </select><br><br>

    Lokasi: <input type="text" name="lokasi"><br><br>
    Keterangan: <br>
    <textarea name="keterangan"></textarea><br><br>

    <button name="kirim">Kirim</button>
</form> 