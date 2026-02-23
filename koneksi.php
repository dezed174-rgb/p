<?php
$conn = mysqli_connect("localhost","root","","db_aspirasi_sekolah");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>