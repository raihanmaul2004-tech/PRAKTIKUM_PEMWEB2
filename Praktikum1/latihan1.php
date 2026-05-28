<?php
// belajar php

#belajar laravel

/*ini komentar 1
ini komentar 2
ini komentar 3*/

// cetak
echo "hello world";
echo "<br>";
echo "belajar php";

echo "<hr>";

//variable
$nama = "Raihan";
$umur = 20;
$alamat = "depok";
$berat = 20.5;

//cetak variable
echo 'Nama saya ' .$nama. ' umur saya ' .$umur. ' alamat di ' .$alamat. ' berat ' .$berat;
echo '<hr>';

//variable sistem
echo $_SERVER['SERVER_NAME'];
echo '<br>';
echo $_SERVER['DOCUMENT_ROOT'];
echo '<hr>';

//variavle konstanta
$jari2 = 100;
define('phi', 3.14);
$luas = phi * $jari2 * $jari2;
echo 'Luas lingkaran dengan jari-jari ' .$jari2. ' = ' .$luas;
echo '<hr>';

//fungsi if jika nilai >5 makan bagus, selain itu buruk
$nilai = 2;
if ($nilai > 5) {
    echo 'Bagus';
} else {
    echo 'Buruk';
}
echo '<hr>';
//ternary
$nilaiku = 10;
echo $nilaiku > 5 ? 'Bagus' : 'Buruk';
echo '<hr>';

//if multi kondisi
//jika umur lebih dari 20 tahun s.d 50 tahun, anda dapat mengendarai mobil
//jika umur lebih dari 17 tahun, anda dapat mengendarai motor
//jika umur lebih dari 10 tahun, anda dapat mengendarai sepeda
$umur = 2;
if ($umur > 20 && $umur <= 50){
    echo 'anda mengendarai mobil';
} elseif ($umur > 17) {
    echo 'anda dapat mengendarai motor';
} elseif ($umur > 10) {
    echo 'anda dapat mengendarai sepeda';
} else {
    echo 'anda belum dapat mengendarai kendaraan';
}
echo '<hr>';

//switch case
$angka =10  ; 
switch ($angka) {
    case $angka <=70:
        echo "angka cukup";
        break;
    case $angka <=80:
        echo "angka memuaskan";
        break;
    case $angka <=90:
        echo "angka sangat memuaskan";
        break;
    default:
        echo 'angka tidak valid';
}
?>
