<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nonariwa_beauty";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT content FROM about_us WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['content'];
} else {
    echo "Konten tidak ditemukan.";
}

$conn->close();
?>
