<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nonariwa_beauty";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['about-text'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "UPDATE about_us SET content = ? WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $content);

    if ($stmt->execute()) {
        echo "Konten berhasil diperbarui.";
    } else {
        echo "Error saat memperbarui konten: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
