<?php
@include 'config.php';

if (!isset($_SESSION['customer_name'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $customer_name = mysqli_real_escape_string($conn, $_SESSION['customer_name']);  
    $product_name= 'Book';


    // Using if and else for payment method checks
    if ($payment_method === 'khalti') {
        $number = mysqli_real_escape_string($conn, $_POST['khaltiNumber']);
    } else {
        $number = mysqli_real_escape_string($conn, $_POST['esewaNumber']);
    }

    // Debug: Display the received payment method, customer name, and number
    echo "Payment Method: $payment_method<br>";
    echo "Customer Name: $customer_name<br>";
    echo "Number: $number<br>";

    // Construct the SQL query with customer name included
    $sql = "INSERT INTO buy_detail(payment_method, name, num, product_name) VALUES('$payment_method', '$customer_name', '$number', '$product_name')";
    echo "SQL Query: $sql<br>";

    if (mysqli_query($conn, $sql)) {
        header("Location: customer_home.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
    <link rel="stylesheet" href="styles.css" >
<style type="text/css">
   .txt_field {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out;
}

.txt_field:focus {
    border-color: #4CAF50;
    outline: none;
}

</style>
  </head>
  <body>
     <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="customer_home.php" style="color: black;">EE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="customer_home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="customer_product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="customer_about.php">About Us</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer_contact.php">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- navbar -->
  <div class="updateformdata"> 
    <div class="center">
        <h1>Update Data</h1>

<form method="POST" action="">
        <input type="radio" name="payment_method" id="esewa" value="esewa" onclick="EnableDisableTB();">
        <label>esewa</label><br>

        <input type="radio" name="payment_method" id="khalti" value="khalti" onclick="EnableDisableTB();">
        <label>khalti</label>

        <input class="txt_field" type="tel" id="esewaNumber" name="esewaNumber" placeholder="esewa number" required style="display:none;">
        <input class="txt_field" type="tel" id="khaltiNumber" name="khaltiNumber" placeholder="khalti number" required style="display:none;">

        <button type="submit" name="submit" value="Update">Buy Now</button>
    </form>
    </div>
</div>
    <script type="text/javascript">
        function EnableDisableTB() {
            var esewaNumberInput = document.getElementById("esewaNumber");
            var khaltiNumberInput = document.getElementById("khaltiNumber");
            var khaltiRadio = document.getElementById("khalti");

            if (khaltiRadio.checked) {
                esewaNumberInput.style.display = "none";
                khaltiNumberInput.style.display = "block";
            } else {
                esewaNumberInput.style.display = "block";
                khaltiNumberInput.style.display = "none";
            }
        }
    </script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>
