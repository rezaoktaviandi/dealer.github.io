<?php
session_start();

// Cek status login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html'); // Arahkan ke halaman login jika belum login
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang di Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
