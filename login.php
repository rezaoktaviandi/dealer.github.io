<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'mydatabase';
$username = 'root'; // Ganti dengan username database kamu
$password = ''; // Ganti dengan password database kamu

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = htmlspecialchars(trim($_POST['username']));
        $pass = htmlspecialchars(trim($_POST['password']));

        // Ambil data pengguna dari database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password
        if ($result && password_verify($pass, $result['password'])) {
            echo "Login berhasil! Selamat datang, " . htmlspecialchars($result['username']) . "!";
            // Redirect ke halaman dashboard atau lainnya
            // header('Location: dashboard.html');
        } else {
            echo "Username atau password salah!";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
