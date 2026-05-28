<?php
include_once 'koneksi.php';

// Hapus data
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM level WHERE id=$id");
    header('Location: index.php?hal=level');
    exit;
}

// Tambah data
if (isset($_POST['tambah'])) {
    $nama = trim($_POST['nama']);
    if ($nama !== '') {
        $nama_safe = mysqli_real_escape_string($conn, $nama);
        mysqli_query($conn, "INSERT INTO level (nama) VALUES ('$nama_safe')");
    }
    header('Location: index.php?hal=level');
    exit;
}

// Edit data
if (isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $nama = trim($_POST['nama']);
    if ($nama !== '') {
        $nama_safe = mysqli_real_escape_string($conn, $nama);
        mysqli_query($conn, "UPDATE level SET nama='$nama_safe' WHERE id=$id");
    }
    header('Location: index.php?hal=level');
    exit;
}

// Ambil data level
$result = mysqli_query($conn, "SELECT * FROM level ORDER BY id ASC");
?>
<div class="container-fluid mt-4">
  <h2>Level CRUD</h2>
  <p>Data level mulai dari TK, SD, SMP, SMA, dan seterusnya.</p>

  <form method="post" action="index.php?hal=level" class="mb-4 row g-2 align-items-end">
    <div class="col-md-8">
      <label class="form-label">Nama Level</label>
      <input type="text" name="nama" class="form-control" placeholder="Misal: TK, SD, SMP" required>
    </div>
    <div class="col-md-4">
      <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah Level</button>
    </div>
  </form>

  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th style="width: 80px;">ID</th>
        <th>Nama Level</th>
        <th style="width: 180px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td>
            <a href="index.php?hal=level&edit=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="index.php?hal=level&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus level ini?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <?php if (isset($_GET['edit'])):
      $edit_id = intval($_GET['edit']);
      $edit_result = mysqli_query($conn, "SELECT * FROM level WHERE id=$edit_id");
      $edit_row = mysqli_fetch_assoc($edit_result);
      if ($edit_row):
  ?>
    <div class="card mt-4">
      <div class="card-body">
        <h5 class="card-title">Edit Level</h5>
        <form method="post" action="index.php?hal=level">
          <input type="hidden" name="id" value="<?= $edit_row['id'] ?>">
          <div class="mb-3">
            <label class="form-label">Nama Level</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($edit_row['nama']) ?>" required>
          </div>
          <button type="submit" name="edit" class="btn btn-success">Simpan Perubahan</button>
          <a href="index.php?hal=level" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  <?php endif; endif; ?>
</div>
