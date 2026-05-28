<?php
$host = "localhost";
$user = "root";      // sesuaikan dengan user MySQL kamu
$pass = "";          // sesuaikan dengan password MySQL kamu
$db   = "datasaya";  // nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
