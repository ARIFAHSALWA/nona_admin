<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "nonariwa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_POST['delete'])) {
    $id_to_delete = $_POST['delete'];
    $sql_delete = "DELETE FROM bookings WHERE id = $id_to_delete";

    if ($conn->query($sql_delete) === TRUE) {
        // Redirect or display success message
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from the bookings table
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Mansalva&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .sidebar {
            position: fixed;
            height: 100%;
            width: 260px;
            background: #FFD1D1;
            padding: 15px;
            transition: all 0.3s ease;
            z-index: 1000;
            left: 0; /* Mengatur posisi sidebar di kiri */
        }
        .sidebar.close {
            transform: translateX(-100%); /* Menggeser sidebar keluar layar */
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            font-size: 23px;
            font-weight: bold;
            font-family: 'Mansalva', cursive;
            color: #A87676;
            transform: rotate(-3deg);
            display: inline-block;
        }
        .sidebar a {
            color: #A87676;
            text-decoration: none;
        }
        .menu-content {
            position: relative;
            height: 100%;
            width: 100%;
            overflow-y: scroll;
        }
        .menu-content::-webkit-scrollbar {
            display: none;
        }
        .menu-items {
            list-style: none;
            height: 100%;
            width: 100%;
            transition: all 0.4s ease;
        }
        .submenu-active .menu-items {
            transform: translateX(-56%);
        }
        .menu-title {
            color: #A87676;    /* tulisan dashboard */
            font-size: 20px;
            padding: 15px 20px;
        }
        .item a {
            padding: 16px;
            display: block;
            border-radius: 12px;
        }
        .item a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 260px;
            width: calc(100% - 260px);
            background: #FAEDCB;
            padding: 15px 20px;
            font-size: 25px;
            transition: all 0.3s ease;
            z-index: 1000;
            color: #A87676;   /* warna garis tiga navside */
        }
        .sidebar.close ~ .navbar {
            left: 0; /* Mengatur navbar untuk menyesuaikan dengan sidebar yang bersembunyi */
            width: 100%; /* Mengatur lebar navbar agar penuh saat sidebar bersembunyi */
        }
        .fa-bars {
            color: #A87676; /* Warna ikon garis tiga menjadi #A87676 */
            cursor: pointer;
        }
        .main {
            margin-left: 260px;
            padding: 80px 20px 20px 20px;
            transition: all 0.3s ease;
            background: #fffdf7;
            min-height: 100vh;
        }
        .sidebar.close ~ .main {
            margin-left: 0; /* Mengatur konten utama untuk menyesuaikan dengan sidebar yang bersembunyi */
        }
        .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 20px; /* jarak antar kotak */
            padding-top: 40px; /* jarak antara kotak dengan teks di atasnya */
        }
        .box {
            background-color: #FFD1D1; /* Warna background kotak */
            padding: 20px;
            border-radius: 10px;
            min-width: 200px; /* lebar minimum kotak */
            max-width: 300px; /* lebar maksimum kotak */
            text-align: center;
        }
        .box h2 {
            color: #A87676; /* Warna teks judul kotak */
            font-size: 20px;
            margin-bottom: 10px; /* Jarak antara judul dan deskripsi */
        }
        .box p {
            color: #A87676; /* Warna teks deskripsi kotak */
            font-size: 16px;
        }
        h1 {
            color: #A87676; /* Warna tulisan */
            font-size: 32px; /* Ukuran font */
            font-family: 'Mansalva', cursive; /* Menggunakan font Mansalva */
            text-align: center; /* Posisi tengah */
            margin-top: 20px; /* Jarak atas */
        }
        .action {
            text-align: center;
        }
        .action button {
            margin: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #A87676;
            color: white;
            cursor: pointer;
        }
        .action button:hover {
            background-color: #873b4a;
        }
        .status button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .status button.active {
            background-color: green;
            color: white;
        }
        .status button.inactive {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo-container">
            <a href="#" class="logo">NONARIWA</a>
            <a href="#" class="logo">BEAUTY</a>
        </div>
        <div class="menu-content">
            <ul class="menu-items">
                <li class="item">
                    <a href="dashboard_admin.php">Dashboard</a>
                </li>
                <li class="item">
                    <a href="about_admin.php">About</a>
                </li>
                <li class="item">
                    <a href="ourgallery_admin.php">Our Gallery</a>
                </li>
                <li class="item">
                    <a href="review_admin.php">Review</a>
                </li>
                <li class="item">
                    <a href="booking_admin.php">Booking</a>
                </li>
                <li class="item">
                    <a href="sale_admin.php">Sale</a>
                </li>
                <li class="item">
                    <a href="../login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>
    
    <main class="main">
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Makeup Category</th>
                    <th>Events</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["number"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["makeup_category"] . "</td>";
                        echo "<td>" . $row["events"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td class='action'>
                                <form method='POST' style='display:inline-block;'>
                                    <button type='submit' name='delete' value='" . $row['id'] . "'>Delete</button>
                                </form>
                              </td>";
                        echo "<td class='status'>
                                <button class='active' onclick='toggleStatus(this)'>Active</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found</td></tr>";
                }

                // Close database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <script src="script.js"></script>
    <script>
        function toggleStatus(button) {
            if (button.classList.contains('active')) {
                button.classList.remove('active');
                button.classList.add('inactive');
                button.textContent = 'Inactive';
            } else {
                button.classList.remove('inactive');
                button.classList.add('active');
                button.textContent = 'Active';
            }
        }

        const sidebar = document.querySelector(".sidebar");
        const sidebarClose = document.querySelector("#sidebar-close");
        const menu = document.querySelector(".menu-content");
        const menuItems = document.querySelectorAll(".submenu-item");
        const subMenuTitles = document.querySelectorAll(".submenu .menu-title");
        sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));
        menuItems.forEach((item, index) => {
            item.addEventListener("click", () => {
                menu.classList.add("submenu-active");
                item.classList.add("show-submenu");
                menuItems.forEach((item2, index2) => {
                    if (index !== index2) {
                        item2.classList.remove("show-submenu");
                    }
                });
            });
        });
        subMenuTitles.forEach((title) => {
            title.addEventListener("click", () => {
                menu.classList.remove("submenu-active");
            });
        });
    </script>
</body>
</html>
