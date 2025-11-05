<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h2>Edit Data Mahasiswa</h2>
  <form action="update.php" method="post" class="mt-3">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="mb-3">
      <label class="form-label">NIM</label>
      <input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jurusan</label>
      <input type="text" name="jurusan" class="form-control" value="<?= $row['jurusan'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label>
      <select name="gender" class="form-select" required>
        <option value="Laki-laki" <?= $row['gender']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $row['gender']=='Perempuan'?'selected':'' ?>>Perempuan</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

</body>
</html>
