<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "nonariwa";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Jika terdapat permintaan untuk menambahkan kategori
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $_POST["categoryName"];
    $price = $_POST["price"];

    // Memasukkan data ke dalam tabel categories
    $sql = "INSERT INTO ourgallery_admin (category_name, price) VALUES ('$categoryName', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
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

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th,
td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

.btn-group {
  display: flex;
  gap: 5px;
}

.btn {
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

.btn-edit {
  background-color: #007bff;
  color: #fff;
}

.btn-delete {
  background-color: #dc3545;
  color: #fff;
}

.btn-status {
  background-color: #28a745;
  color: #fff;
}

.add-category-btn {
  margin-top: 20px;
  margin-right: auto;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

.edit-form-popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fefefe;
  z-index: 2;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.edit-form-popup label {
  font-weight: bold;
}

.edit-form-popup input[type="text"],
.edit-form-popup input[type="number"] {
  width: 100%;
  padding: 5px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.edit-form-popup button {
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  background-color: #28a745;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
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
  <h2>Our Gallery</h2>

  <table>
    <thead>
      <tr>
        <th>Makeup Category</th>
        <th>Price</th>
        <th>Action</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="gallery-table-body">
      <!-- Table rows will be dynamically added here -->
    </tbody>
  </table>
  <button class="add-category-btn" onclick="toggleAddCategoryForm()">
    Add Category
  </button>

  <div class="add-category-form" id="addCategoryForm" style="display: none;">
    <!-- Form untuk menambah kategori -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" name="categoryName" id="categoryInput" placeholder="Enter category name" />
      <input type="number" name="price" id="priceInput" placeholder="Enter price" />
      <button type="submit">Add</button>
    </form>
  </div>

  <!-- Edit form popup -->
  <div class="edit-form-popup" id="editFormPopup">
    <!-- Form untuk mengedit kategori -->
    <h3>Edit Category</h3>
    <label for="editCategoryInput">Category Name:</label>
    <input type="text" id="editCategoryInput" placeholder="Enter category name" />
    <label for="editPriceInput">Price:</label>
    <input type="number" id="editPriceInput" placeholder="Enter price" />
    <button onclick="saveEditedCategory()">Save</button>
  </div>
</div>

<script>
  function toggleNav() {
    var sidenav = document.getElementById("mySidenav");
    var toggleBtn = document.querySelector(".toggle-btn");

    if (sidenav.style.width === "200px") {
      sidenav.style.width = "0";
      toggleBtn.classList.remove("open");
    } else {
      sidenav.style.width = "200px";
      toggleBtn.classList.add("open");
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

  function toggleAddCategoryForm() {
    var form = document.getElementById("addCategoryForm");
    form.style.display = form.style.display === "none" ? "block" : "none";
  }

  // Function to populate the table with data
  function populateTable() {
    var galleryTableBody = document.getElementById("gallery-table-body");

    // Sample data, replace with your own logic to fetch data
    var makeupData = [
      { category: "Lipstick", price: "$20", status: "Active" },
      { category: "Eyeshadow", price: "$25", status: "Active" },
      { category: "Foundation", price: "$30", status: "Inactive" },
    ];

    makeupData.forEach(function (item) {
      var row = document.createElement("tr");
      row.innerHTML = `
        <td>${item.category}</td>
        <td>${item.price}</td>
        <td>
            <div class="btn-group">
                <button class="btn btn-edit" onclick="showEditForm('${item.category}', '${item.price}')">Edit</button>
                <button class="btn btn-delete" onclick="deleteCategory(this)">Delete</button>
            </div>
        </td>
        <td>
            <button class="btn btn-status" onclick="toggleStatus(this)">${item.status}</button>
        </td>
    `;
      galleryTableBody.appendChild(row);
    });
  }

  // Function to toggle status between Active and Inactive
  function toggleStatus(button) {
    if (button.innerText === "Active") {
      button.innerText = "Inactive";
      button.style.backgroundColor = "#dc3545";
    } else {
      button.innerText = "Active";
      button.style.backgroundColor = "#28a745";
    }
  }

  // Function to show edit form
  function showEditForm(category, price) {
    var editFormPopup = document.getElementById("editFormPopup");
    var editCategoryInput = document.getElementById("editCategoryInput");
    var editPriceInput = document.getElementById("editPriceInput");

    editCategoryInput.value = category;
    editPriceInput.value = price;
    editFormPopup.style.display = "block";
  }

  // Function to delete category
  function deleteCategory(button) {
    var row = button.parentNode.parentNode.parentNode; // Get the <tr> element
    row.parentNode.removeChild(row); // Remove the <tr> element from its parent
  }

  // Function to save edited category
  function saveEditedCategory() {
    var editFormPopup = document.getElementById("editFormPopup");
    var editCategoryInput = document.getElementById("editCategoryInput");
    var editPriceInput = document.getElementById("editPriceInput");
    var editedCategory = editCategoryInput.value.trim();
    var editedPrice = editPriceInput.value.trim();

    // Here you can update the category and price in the table
    // For now, let's just log them
    console.log("Edited Category:", editedCategory);
    console.log("Edited Price:", editedPrice);

    // Close the edit form popup
    editFormPopup.style.display = "none";
  }

  // Function to add a new category
  function addCategory() {
    var categoryInput = document.getElementById("categoryInput");
    var priceInput = document.getElementById("priceInput");
    var categoryName = categoryInput.value.trim();
    var price = priceInput.value.trim();

    if (categoryName !== "" && price !== "") {
      var galleryTableBody = document.getElementById("gallery-table-body");
      var row = document.createElement("tr");
      row.innerHTML = `
        <td>${categoryName}</td>
        <td>${price}</td>
        <td>
            <div class="btn-group">
                <button class="btn btn-edit" onclick="showEditForm('${categoryName}', '${price}')">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </td>
        <td>
            <button class="btn btn-status" onclick="toggleStatus(this)">Active</button>
        </td>
    `;
      galleryTableBody.appendChild(row);
      categoryInput.value = "";
      priceInput.value = "";
      var form = document.getElementById("addCategoryForm");
      form.style.display = "none";
    } else {
      alert("Please enter both category name and price.");
    }
  }

  // Call populateTable function when the page loads
  window.onload = function () {
    populateTable();
  };
</script>
</body>
</html>