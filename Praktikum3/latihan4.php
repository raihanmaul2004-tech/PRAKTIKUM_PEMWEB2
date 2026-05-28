<?php

$nama = "Budi";
$nim = "123456";
$jurusan = "Sistem Informasi";

//membuat fungsi untuk menampilkan daya mahasiswa
function tampilkanData($nama, $nim, $jurusan){
    echo "Nama: " . $nama . "<br>";
    echo "Nim: " . $nim . "<br>"; 
    echo "Jurusan: " . $jurusan . "<br>";
}

//memanggil fungsi untuk menampilkan data mahasiswa
tampilkanData ($nama, $nim, $jurusan);
?>