<?php
// koneksi.php
$host = 'localhost';
$user = 'root';   // username default XAMPP
$pass = '';       // kosongkan jika tidak ada password
$db   = 'db_mahasiswa';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
