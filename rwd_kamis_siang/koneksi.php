<?php
$dsn = 'mysql:dbname=dbtoko;host=localhost;port=3306';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Terjadi kesalahan koneksi dengan sebab ' . $e->getMessage();
    die();
}
?>
