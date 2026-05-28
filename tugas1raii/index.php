<?php
session_start();
ob_start();
include_once 'koneksi.php';

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}

include_once 'kode_atas.php';
include_once 'header.php';
include_once 'menu.php';
echo '<br/>';
include_once 'sidebar.php';
include_once 'main.php';
echo '<br/>';
include_once 'footer.php';
include_once 'kode_bawah.php';
ob_end_flush();