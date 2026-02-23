<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['login']) || $_SESSION['login'] != "admin"){
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard Admin</h2>
<a href="logout.php">Logout</a>

<hr>

<h3>Semua Aspirasi</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>NIS</th>
    <th>Lokasi</th>
    <th>Keterangan</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($conn,"SELECT * FROM aspirasi");

while($d = mysqli_fetch_array($data)){
?>
<tr>
    <td><?= $d['id_aspirasi']; ?></td>
    <td><?= $d['nis']; ?></td>
    <td><?= $d['lokasi']; ?></td>
    <td><?= $d['keterangan']; ?></td>
    <td><?= $d['status']; ?></td>
    <td>
        <a href="update_status.php?id=<?= $d['id_aspirasi']; ?>">Ubah</a>
    </td>
</tr>
<?php } ?>
</table>