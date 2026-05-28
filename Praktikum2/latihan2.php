<form method="POST">
    Nama: <input type="text" name="nama" />
    <br/>Nilai: <input type="text" name="nilai"/>
    <br/><input type="submit" name="proses" />
</form>
<?php
//tangkap request form
$siswa = $_POST['nama'];
$nilai = $_POST['nilai'];
$button = $_REQUEST['proses'];
$ket = ($nilai >= 60)? "Lulus" : "Gagal";
//cetak jika sudah submit
if(isset($button)){
?>
Nama: <?=$siswa?>
<br/>Nilai:<?=$nilai?>
<br/>Keterangan:<?=$ket?>
<?php } ?>
