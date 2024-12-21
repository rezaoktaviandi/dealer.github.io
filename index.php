<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aksi</title>
</head>
<body>
    <h2>Tambah Aksi</h2>
    <form method="POST" action="add_action.php">
        <label for="action_name">Nama Aksi:</label>
        <input type="text" id="action_name" name="action_name" required>
        <br>
        <button type="submit">Tambah Aksi</button>
    </form>

    <h3>Daftar Aksi</h3>
    <ul>
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'username', 'password', 'my_database');

        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Ambil data aksi
        $sql = "SELECT * FROM actions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['action_name'] . "</li>";
            }
        } else {
            echo "<li>Tidak ada aksi.</li>";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>






