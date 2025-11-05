<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Speda - Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style> body { padding-top: 70px; } </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="speda.jpg" alt="Logo" width="30" height="30" class="me-2">
        Speda
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu2">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu2">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="addMahasiswa.php">Tambah Mahasiswa</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="my-3">
      <h1 class="h4">Tambah Mahasiswa</h1>
      <p class="text-muted">Isi data mahasiswa lalu klik Tambah.</p>

      <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-<?php echo htmlspecialchars($_GET['type'] ?? 'success'); ?> alert-dismissible fade show" role="alert">
          <?php echo htmlspecialchars($_GET['msg']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <form id="addForm" class="row g-3" method="post" action="proses_add.php">
        <div class="col-md-4">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control" name="nim" id="nim" required />
        </div>
        <div class="col-md-8">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" required />
        </div>
        <div class="col-md-6">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" id="jurusan" />
        </div>
        <div class="col-md-6">
          <label for="gender" class="form-label">Jenis Kelamin</label>
          <select id="gender" class="form-select" name="gender" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href="index.php" class="btn btn-secondary">Kembali ke Home</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
