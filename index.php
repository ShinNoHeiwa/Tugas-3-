<?php
include 'koneksi.php';

// Fitur search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' OR nim LIKE '%$search%' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Speda</a>
    <div>
      <a href="addMahasiswa.php" class="btn btn-success">+ Tambah Mahasiswa</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2>Data Mahasiswa</h2>

  <form method="get" class="d-flex mb-3">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama atau NIM" value="<?= $search ?>">
    <button class="btn btn-outline-primary" type="submit">Cari</button>
  </form>

  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php $no=1; while($row=mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['jurusan']) ?></td>
            <td><?= htmlspecialchars($row['gender']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus <?= $row['nama'] ?>?')" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6" class="text-center">Tidak ada data mahasiswa.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
