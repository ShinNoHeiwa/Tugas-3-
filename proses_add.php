<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim     = trim($_POST['nim']);
    $nama    = trim($_POST['nama']);
    $jurusan = trim($_POST['jurusan']);
    $gender  = trim($_POST['gender']);

    if ($nim === '' || $nama === '' || $gender === '') {
        header("Location: addMahasiswa.php?msg=" . urlencode("NIM, Nama, dan Jenis Kelamin wajib diisi.") . "&type=danger");
        exit;
    }

    // Cek apakah NIM sudah ada
    $check = mysqli_prepare($conn, "SELECT id FROM mahasiswa WHERE nim = ?");
    mysqli_stmt_bind_param($check, 's', $nim);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);
    if (mysqli_stmt_num_rows($check) > 0) {
        header("Location: addMahasiswa.php?msg=" . urlencode("NIM sudah terdaftar, gunakan NIM lain.") . "&type=danger");
        exit;
    }

    // Insert data baru
    $stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nim, nama, jurusan, gender) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $nim, $nama, $jurusan, $gender);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: addMahasiswa.php?msg=" . urlencode("Data mahasiswa berhasil ditambahkan.") . "&type=success");
    } else {
        header("Location: addMahasiswa.php?msg=" . urlencode("Gagal menambahkan data.") . "&type=danger");
    }
}
?>
