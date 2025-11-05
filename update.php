<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $gender = $_POST['gender'];

  $sql = "UPDATE mahasiswa SET
            nim='$nim',
            nama='$nama',
            jurusan='$jurusan',
            gender='$gender'
          WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php");
  } else {
    echo "Gagal mengupdate data: " . mysqli_error($conn);
  }
}
?>
