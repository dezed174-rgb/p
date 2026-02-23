<?php
include "koneksi.php";

if(isset($_POST['daftar'])){

    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];

    // cek apakah NIS sudah ada
    $cek = mysqli_query($conn,"SELECT * FROM siswa WHERE nis='$nis'");

    if(mysqli_num_rows($cek) > 0){
        echo "NIS sudah terdaftar!";
    } else {

        mysqli_query($conn,"INSERT INTO siswa (nis,kelas)
        VALUES('$nis','$kelas')");

        echo "Registrasi berhasil!";
        header("refresh:1;url=login.php");
    }
}
?>

<h2>Registrasi Siswa</h2>

<form method="POST">
    NIS : <input type="text" name="nis" required><br><br>
    Kelas : <input type="text" name="kelas" required><br><br>

    <button name="daftar">Daftar</button>
</form>

<br>
Sudah punya akun? <a href="login.php">Login disini</a>