<?php
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if(!isset($_SESSION['username'])){
    header("Location: index.php?hal=login");
    exit;
}

// Hapus data
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM studies WHERE id=$id");
    
    // Jika tabel kosong, reset AUTO_INCREMENT ke 1
    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM studies"));
    if($count['total'] == 0){
        mysqli_query($conn, "ALTER TABLE studies AUTO_INCREMENT = 1");
    }
    
    header("Location: index.php?hal=mystudies");
    exit;
}

// Tambah data
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $id_level = $_POST['id_level'];
    $keterangan = $_POST['keterangan'];
    $tahun = $_POST['tahun_lulus'];
    $foto = '';
    
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $target_dir = 'Images/';
        $file_name = uniqid() . '_' . basename($_FILES['foto']['name']);
        $target_file = $target_dir . $file_name;
        
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)){
            $foto = $file_name;
        }
    }

    mysqli_query($conn, "INSERT INTO studies (nama,id_level,keterangan,tahun_lulus,foto_sekolah)
                         VALUES ('$nama','$id_level','$keterangan','$tahun','$foto')");

    header("Location: index.php?hal=mystudies");
    exit;
}

// Edit data
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_level = $_POST['id_level'];
    $keterangan = $_POST['keterangan'];
    $tahun = $_POST['tahun_lulus'];
    $foto = $_POST['foto_lama'];
    
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $target_dir = 'Images/';
        $file_name = uniqid() . '_' . basename($_FILES['foto']['name']);
        $target_file = $target_dir . $file_name;
        
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)){
            $foto = $file_name;
        }
    }
    
    mysqli_query($conn, "UPDATE studies SET nama='$nama', id_level='$id_level',
                         keterangan='$keterangan', tahun_lulus='$tahun', foto_sekolah='$foto'
                         WHERE id=$id");
    header("Location: index.php?hal=mystudies");
    exit;
}

// Ambil data untuk ditampilkan
$sql = "SELECT s.id, s.nama, l.nama AS level, s.keterangan, s.tahun_lulus, s.foto_sekolah
        FROM studies s JOIN level l ON s.id_level = l.id";
$result = mysqli_query($conn, $sql);
?>
<div class="container-fluid mt-4">

<h2>Daftar Studies</h2>

<!-- Form Tambah -->
<form method="post" action="index.php?hal=mystudies" enctype="multipart/form-data" class="mb-4">
  <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
  <select name="id_level" class="form-control mb-2" required>
    <option value="">-- Pilih Level --</option>
    <?php
    $levels = mysqli_query($conn, "SELECT * FROM level");
    while($lvl = mysqli_fetch_assoc($levels)){
      echo "<option value='{$lvl['id']}'>{$lvl['nama']}</option>";
    }
    ?>
  </select>
  <textarea name="keterangan" placeholder="Keterangan" class="form-control mb-2" required></textarea>
  <input type="text" name="tahun_lulus" placeholder="Tahun Lulus" class="form-control mb-2" required>
  <input type="file" name="foto" class="form-control mb-2" accept="image/*">
  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
</form>

<!-- Tabel Data -->
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th><th>Nama</th><th>Level</th><th>Keterangan</th><th>Tahun</th><th>Foto</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['level']; ?></td>
      <td><?= $row['keterangan']; ?></td>
      <td><?= $row['tahun_lulus']; ?></td>
      <td>
        <?php if(!empty($row['foto_sekolah'])): ?>
          <img src="Images/<?= $row['foto_sekolah']; ?>" alt="Foto" style="max-width: 80px; max-height: 80px;" class="img-thumbnail">
        <?php else: ?>
          <span class="text-muted">-</span>
        <?php endif; ?>
      </td>
      <td>
        <a href="index.php?hal=mystudies&edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="index.php?hal=mystudies&delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Form Edit (muncul kalau ada ?edit=id) -->
<?php if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM studies WHERE id=$id"));
?>
<h3>Edit Data</h3>
<form method="post" action="index.php?hal=mystudies" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data['id']; ?>">
  <input type="hidden" name="foto_lama" value="<?= $data['foto_sekolah']; ?>">
  <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control mb-2" required>
  <select name="id_level" class="form-control mb-2" required>
    <?php
    $levels = mysqli_query($conn, "SELECT * FROM level");
    while($lvl = mysqli_fetch_assoc($levels)){
      $sel = ($lvl['id']==$data['id_level']) ? 'selected' : '';
      echo "<option value='{$lvl['id']}' $sel>{$lvl['nama']}</option>";
    }
    ?>
  </select>
  <textarea name="keterangan" class="form-control mb-2" required><?= $data['keterangan']; ?></textarea>
  <input type="text" name="tahun_lulus" value="<?= $data['tahun_lulus']; ?>" class="form-control mb-2" required>
  <div class="mb-2">
    <?php if(!empty($data['foto_sekolah'])): ?>
      <p class="mb-2">Foto saat ini:</p>
      <img src="Images/<?= $data['foto_sekolah']; ?>" alt="Foto" style="max-width: 150px;" class="img-thumbnail mb-3">
    <?php endif; ?>
    <label class="form-label">Ganti Foto (opsional):</label>
    <input type="file" name="foto" class="form-control" accept="image/*">
  </div>
  <button type="submit" name="edit" class="btn btn-success">Simpan Perubahan</button>
</form>
<?php } ?>

</div>
