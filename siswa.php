<?php
session_start();
include "koneksi.php";

if($_SESSION['login'] != "siswa"){
    header("Location: login.php");
    exit;
}

$nis = $_SESSION['nis'];
?>

<h2>Dashboard Siswa</h2>
<a href="input_aspirasi.php">Input Aspirasi</a> |
<a href="logout.php">Logout</a>

<hr>

<h3>Histori Aspirasi</h3>

<?php
$data = mysqli_query($conn,"SELECT * FROM aspirasi WHERE nis='$nis'");

while($d = mysqli_fetch_array($data)){
    echo "Lokasi: ".$d['lokasi']."<br>";
    echo "Keterangan: ".$d['keterangan']."<br>";
    echo "Status: ".$d['status']."<br>";
    echo "Feedback: ".$d['feedback']."<br>";
    echo "<hr>";
}
?>