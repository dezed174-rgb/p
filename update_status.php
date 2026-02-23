<?php
include "koneksi.php";

$id = $_GET['id'];

if(isset($_POST['update'])){
    $status = $_POST['status'];
    $feedback = $_POST['feedback'];

    mysqli_query($conn,"UPDATE aspirasi 
    SET status='$status', feedback='$feedback'
    WHERE id_aspirasi='$id'");

    header("Location: admin.php");
}

$data = mysqli_query($conn,"SELECT * FROM aspirasi WHERE id_aspirasi='$id'");
$d = mysqli_fetch_array($data);
?>

<h2>Update Status</h2>

<form method="POST">
    Status:
    <select name="status">
        <option>Menunggu</option>
        <option>Proses</option>
        <option>Selesai</option>
    </select><br><br>

    Feedback:<br>
    <textarea name="feedback"><?= $d['feedback']; ?></textarea><br><br>

    <button name="update">Update</button>
</form>