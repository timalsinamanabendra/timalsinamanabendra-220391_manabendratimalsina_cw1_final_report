<?php

@include 'config.php';

if(!isset($_SESSION['seller_name'])){
   header('location:login.php');
};


if (isset($_POST['upload']) && isset($_FILES['my_image'])) {


$product_name= mysqli_real_escape_string($conn, $_POST['product_name']);
$description =mysqli_real_escape_string($conn, $_POST['description']);
$price =mysqli_real_escape_string($conn, $_POST['price']);



    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

   $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];



    if($error === 0){
        if ($img_size > 125000) {
            $em = "Sorry, your file size is too large......";
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc= strtolower($img_ex);


            $allowed_exs =array("jpg", "png", "jpeg");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);


                $sql = "Insert into images(product_name,description,price,image_url) VALUES('$product_name','$description','$price','$new_img_name') ";
                mysqli_query($conn, $sql);
                header("Location:  seller_home.php");

            }
            else{
                $em = "You can't upload files of this type";
                        header("Location:  seller_home.php");

            }
        }

    }
    else{
        $em = "unknown error occured!!!";
        header("Location:  seller_home.php");


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

                    <a id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              </div>
            </div>
          </nav>
        <!-- navbar -->


        <!-- upload product details -->
        <div style="max-height: 0px;">
        <form  action="" method="post" enctype="multipart/form-data">
        <div class="container login">
            <div class="row">
                <div class="col-md-8" id="side2">
                    <h3>UPLOAD PRODUCT WITH DETAILS</h3>
                    <div class="inp">
                        <input type="text" placeholder="PRODUCT NAME" name="product_name" required>
                        <textarea style="margin-top: 20px; width: 58.5%; margin-left: 20.5%;"  class="form-control" id=""rows="3" name="description" placeholder="DESCRIPTION"></textarea>
                        <input type="text" placeholder="Product Prices" name="price"  required><br>
                        <input type="file" name="my_image" required><br><br>


                    <div id="login" style="margin-bottom: 12px;"><button type="submit" name="upload" value="Upload">UPLOAD</button></div>
                </div>
            </div>
        </div>
        </form>
        </div>
    <!-- upload image -->


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
                  <li><a href="seller_home.php">Home</a></li>
                  <li><a href="seller_about.php">About</a></li>
                  <li><a href="seller_contact.php">Contact</a></li>

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
<hr>
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
<script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
