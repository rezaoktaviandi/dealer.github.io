<?php
$host = 'localhost';
$db = 'login';
$user = 'root'; // Ganti sesuai pengguna database Anda
$pass = ''; // Ganti jika Anda menggunakan password

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
