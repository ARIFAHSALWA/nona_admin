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

        .review-card {
    display: flex; /* Mengubah kartu review menjadi flex container */
    flex-direction: row; /* Mengatur arah item ke samping */
    align-items: center; /* Mengatur penempatan item secara vertikal di tengah */
    width: 100%; /* Menyesuaikan lebar dengan kontainer utama */
    margin: 20px 0; /* Mengatur margin atas dan bawah */
}

.review-card img {
    flex: 0 0 200px; /* Lebar gambar tetap 200px, tidak fleksibel */
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.review-card .content {
    flex: 1; /* Menyesuaikan ukuran konten untuk menggunakan sisa ruang */
    padding: 20px;
}

.review-card .content h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.review-card .content p {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.review-card .btn {
    width: 100%;
    padding: 10px 0;
    text-align: center;
    background: #A87676;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.review-card .btn:hover {
    background: #8e5e5e;
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
    <div class="main">
        <!-- Review Card -->
        <div class="review-card">
            <img src="https://via.placeholder.com/300" alt="Review Image">
            <div class="content">
                <h3>Customer Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed eros nec odio convallis ultrices. Nulla vestibulum augue eget lectus fermentum fringilla.</p>
                <a href="#" class="btn">Delete Review</a>
            </div>
        </div>
        <!-- End Review Card -->

        <div class="review-card">
            <img src="https://via.placeholder.com/300" alt="Review Image">
            <div class="content">
                <h3>Customer Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed eros nec odio convallis ultrices. Nulla vestibulum augue eget lectus fermentum fringilla.</p>
                <a href="#" class="btn">Delete Review</a>
            </div>
        </div>

        <div class="review-card">
            <img src="https://via.placeholder.com/300" alt="Review Image">
            <div class="content">
                <h3>Customer Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed eros nec odio convallis ultrices. Nulla vestibulum augue eget lectus fermentum fringilla.</p>
                <a href="#" class="btn">Delete Review</a>
            </div>
        </div>

        <!-- You can add more review cards here -->
    </div>

<script src="script.js"></script>
    <script>
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
