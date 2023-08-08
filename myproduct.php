<?php

    @include 'config.php';
    if(!isset($_SESSION['seller_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ecommerce</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- fonts links -->



    <style type="text/css">
          tr:nth-child(even) {background-color: #f2f2f2} 
          /* Style for the Edit button */
                /* styles.css */

            /* Reset default button styles */
            button {
              background: none;
              border: none;
              padding: 0;
              margin: 0;
            }

            /* Style for the Edit button */
            button a.edit-button {
              display: inline-block;
              padding: 4px 8px; /* Decrease the padding */
              background-color: #4CAF50;
              color: white;
              text-decoration: none;
              border-radius: 4px;
              font-size: 14px; /* Decrease the font-size */
            }

            /* Hover effect for the Edit button */
            button a.edit-button:hover {
              background-color: #45a049;
            }

            /* Style for the Delete button */
            button a.delete-button {
              display: inline-block;
              padding: 4px 8px; /* Decrease the padding */
              background-color: #f44336;
              color: white;
              text-decoration: none;
              border-radius: 4px;
              font-size: 14px; /* Decrease the font-size */
            }

            /* Hover effect for the Delete button */
            button a.delete-button:hover {
              background-color: #d32f2f;
            }
            /* Style for the user info container */



    </style>
</head>
<body>

    <!-- top navbar -->
    <div class="top-navbar">
        <div class="top-icons">
            <a href="https://www.facebook.com/prabesh.timalsina.58" target="_blank" class="facebook"><i  class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/prash9356/" target="_blank" class="instagram"> <i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/manabendra-timalsina-ab147a277/" target="_blank" class="linkin"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>            

<div class="other-links">
                    <a  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #0894d9;">
                      <li><span><?php echo $_SESSION['seller_name'] ?></span></li>
                      <li>Seller</a></li>
                      <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
                    </ul>
        </div>
    </div>
    <!-- top navbar -->

<!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="seller_home.php" style="color: black;">EE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="seller_home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="seller_product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="seller_about.php">About Us</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="seller_contact.php">Contact Us</a>
                  </li>
                    <li>
                      <a class="nav-link" href="addproduct.php">Add product</a>
                  </li>
                <li>
                      <a class="nav-link" href="myproduct.php">My product</a>
                  </li>
                  <li>
                      <a class="nav-link" href="buyproduct.php">Selled product</a>
                  </li>
                </ul>
                                <form class="d-flex">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>

              </div>
            </div>
          </nav>
        <!-- navbar -->




<!-- userdata -->

<table class="table">
    <tr>
        <th class="tableheading">S.N</th>
        <th class="tableheading">Product ID</th>
        <th class="tableheading">Product Name</th>
        <th class="tableheading">Description</th>
        <th class="tableheading">Prices</th>
        <th class="tableheading" colspan="2">Action</th>
    </tr>



<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT product_id, product_name, description, price FROM images";
$result = $conn->query($sql);

// Initialize a user count variable
$userCount = 1;

if ($result->num_rows > 0) {
// Output data of each row
while ($row = $result->fetch_assoc()) {
    echo '<tr class="table-row">
        <td>'.$userCount.'</td>
        <td>'.$row["product_id"]. '</td>
        <td>'.$row["product_name"]. '</td>
       <td>'.$row["description"]. '</td>
        <td>'.$row["price"].'</td>
        <td><button><a class="edit-button" href="editproduct.php?product_id=' . $row['product_id'] . '">Edit</a></button></td>
        <td><button><a class="delete-button" href="deleteproduct.php?product_id=' . $row['product_id'] . '">Delete</a></button></td>
    </tr>';

    // Increment the user count for the next row
    $userCount++;
}
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>

<!-- userdata -->




<!-- footer -->
<footer id="footer" style="margin-top: 50px;">
<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 footer-content">
                <h3>E-Electronic</h3>
                <p>E-Electronic, or electronic commerce (e-commerce), refers to the buying and selling of goods and services over the internet.</p>
                <p>
                    Bhaisepati <br>
                    Lalitpur<br>
                    Nepal<br>
                </p>
                <strong><i class="fas fa-phone"></i> Phone: <strong>+97798********</strong></strong><br>
                <strong><i class="fa-solid fa-envelope"></i> Email: <strong>prabesh.timalsina1234@gmail.com</strong></strong>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <ul>
                  <li><a href="admin_home.php">Home</a></li>
                  <li><a href="admin_about.php">About</a></li>
                  <li><a href="admin_contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <p>We are here to delivert products in time!!...</p>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social World</h4>
                <p>Our Social Worlds is for Providing services and to our valuable customer......</p>
                <div class="socail-links mt-3">
                    <a href="https://www.facebook.com/prabesh.timalsina.58" target="_blank" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/prash9356/" target="_blank" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/manabendra-timalsina-ab147a277/" target="_blank" class="linkin"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="copyright">
        &copy; Copyright <strong>E-Electronics</strong>.All Rights Reserved
    </div>
    <div class="credits">
        Designed By <a href="#">Manabendra Timalsina</a>
    </div>
</div>
</footer>
<!-- footer -->

  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    function filterTable() {
        const searchInput = document.getElementById('searchInput');
        const filter = searchInput.value.toUpperCase();
        const table = document.querySelector('.table');
        const rows = table.querySelectorAll('tr');

        for (let row of rows) {
            const cells = row.getElementsByTagName('td');
            let shouldDisplay = false;
            for (let cell of cells) {
                if (cell) {
                    const cellValue = cell.textContent || cell.innerText;
                    if (cellValue.toUpperCase().indexOf(filter) > -1) {
                        shouldDisplay = true;
                        break;
                    }
                }
            }
            row.style.display = shouldDisplay ? '' : 'none';
        }
    }

    document.getElementById('searchInput').addEventListener('input', filterTable);
</script>




</body>
</html>
