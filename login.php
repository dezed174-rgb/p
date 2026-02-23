<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // CEK ADMIN DULU
    $admin = mysqli_query($conn,"SELECT * FROM admin 
        WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($admin) > 0){
        $_SESSION['login'] = "admin";
        header("Location: admin.php");
        exit;
    }

    // CEK SISWA
    $siswa = mysqli_query($conn,"SELECT * FROM siswa 
        WHERE nis='$username'");

    if(mysqli_num_rows($siswa) > 0){
        $_SESSION['login'] = "siswa";
        $_SESSION['nis'] = $username;
        header("Location: siswa.php");
        exit;
    }

    echo "Login gagal!";
}
?>

<h2>Login</h2>
<form method="POST">
    Username / NIS : <input type="text" name="username" required><br><br>
    Password (Admin saja) : <input type="password" name="password"><br><br>
    <button name="login">Login</button>
</form>