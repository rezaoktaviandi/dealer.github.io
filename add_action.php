<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action_name = $_POST['action_name'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'username', 'password', 'my_database');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Tambah aksi ke database
    $stmt = $conn->prepare("INSERT INTO actions (action_name) VALUES (?)");
    $stmt->bind_param("s", $action_name);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
