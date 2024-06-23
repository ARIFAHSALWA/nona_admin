<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard</title>
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
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .sidebar {
            position: fixed;
            height: 100%;
            width: 260px;
            background: #FFD1D1; /* Warna background sidebar */
            padding: 15px;
            transition: all 0.3s ease;
            z-index: 99;
        }
        .sidebar.close {
            width: 0;
            padding: 0;
            overflow: hidden;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px; /* Menambah jarak antara logo dan menu */
        }
        .logo {
            font-size: 23px; /* Ukuran font yang lebih besar */
            font-weight: bold; /* Menjadikan teks menjadi bold */
            font-family: 'Mansalva', cursive; /* Menggunakan font Mansalva */
            color: #A87676; /* Warna tulisan */
            transform: rotate(-3deg); /* Miringkan teks sebesar 3 derajat ke arah berlawanan jarum jam */
            display: inline-block; /* Menjadikan elemen inline-block untuk dapat diatur posisinya */
        }
        .sidebar a {
            color: #A87676; /* warna tulisan sidenav */
            text-decoration: none;
        }
        .menu-content {
            position: relative;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }
        .menu-content::-webkit-scrollbar {
            display: none;
        }
        .menu-items {
            height: 100%;
            width: 100%;
            list-style: none;
            transition: all 0.4s ease;
        }
        .submenu-active .menu-items {
            transform: translateX(-56%);
        }
        .menu-title {
            color: #A87676;    /*tulisan dashboard*/
            font-size: 20px;
            padding: 15px 20px;
        }
        .item a,
        .submenu-item {
            padding: 16px;
            display: inline-block;
            width: 100%;
            border-radius: 12px;
        }
        .item a:hover,
        .submenu-item:hover,
        .submenu .menu-title:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .submenu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            cursor: pointer;
        }
        .submenu {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            right: calc(-100% - 26px);
            height: calc(100% + 100vh);
            background: #11101d;
            display: none;
        }
        .show-submenu ~ .submenu {
            display: block;
        }
        .submenu .menu-title {
            border-radius: 12px;
            cursor: pointer;
        }
        .submenu .menu-title i {
            margin-right: 10px;
        }
        .navbar,
        .main {
            left: 260px;
            width: calc(100% - 260px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .sidebar.close ~ .navbar,
        .sidebar.close ~ .main {
            left: 0;
            width: 100%;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            color: #A87676;   /* warna garis tiga navside*/
            padding: 15px 20px;
            font-size: 25px;
            background: #FAEDCB; /*NAVBAR ATAS*/
            cursor: pointer;
            z-index: 1000;
        }
        .navbar #sidebar-toggle {
            cursor: pointer;
        }
        .main {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: center;
            padding-top: 80px; /* agar konten tidak tertutup oleh navbar */
            height: calc(100vh - 80px); /* set tinggi konten agar tidak tertutup oleh navbar */
            z-index: 100;
            background: #fffdf7;
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
        <i class="fa-solid fa-bars" id="sidebar-toggle"></i>
    </nav>
    
    <main class="main">
        <h1>Hi Admin, Welcome in Dashboard </h1>
        <div class="box-container">
            <div class="box">
                <h2>About</h2>
                <p>Mengedit deskripsi pada halaman About</p>
            </div>
            <div class="box">
                <h2>Booking</h2>
                <p>Melihat detail data masuk dari booking</p>
            </div>
            <div class="box">
                <h2>Review</h2>
                <p>Melihat dan hapus konten review yang kurang sesuai</p>
            </div>
            <div class="box">
                <h2>Our Gallery</h2>
                <p>Menambah kategori, edit, menghapus dan mengatur active/non untuk makeup kategori </p>
            </div>
            <div class="box">
                <h2>Sale</h2>
                <p>Statistik data penjualan layanan yakni jumlah penjualan mingguan dan bulanan, pendapat total dan layanan paling laris</p>
            </div>
        </div>
    </main>

    <script>
        const sidebar = document.querySelector(".sidebar");
        const sidebarToggle = document.querySelector("#sidebar-toggle");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>
