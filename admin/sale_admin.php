<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sales Statistics for Admin</title>
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
        .statistics {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        .statistic {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .statistic h2 {
            color: #333; /* Warna teks menjadi abu-abu gelap */
            margin-bottom: 1rem;
        }
        .statistic p {
            font-size: 1.2rem;
            color: #333; /* Warna teks menjadi abu-abu gelap */
        }
        .statistic span {
            font-weight: bold;
            color: #e91e63;
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
        <header>
            <h1>Sales Statistics for Admin</h1>
        </header>
        <section class="statistics">
            <div class="statistic">
                <h2>Weekly Sales</h2>
                <p>Number of Sales: <span id="weekly-sales">50</span></p>
            </div>
            <div class="statistic">
                <h2>Monthly Sales</h2>
                <p>Number of Sales: <span id="monthly-sales">200</span></p>
            </div>
            <div class="statistic">
                <h2>Total Revenue</h2>
                <p>Revenue: <span id="total-revenue">$10,000</span></p>
            </div>
            <div class="statistic">
                <h2>Most Popular Service</h2>
                <p>Service: <span id="popular-service">Bridal Makeup</span></p>
            </div>
        </section>
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
