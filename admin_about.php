<?php

@include 'config.php';

if(!isset($_SESSION['admin_name'])){
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
    <a href="admin_signup.php" ><button id="btn-signup">Create Seller</button></a>

                    <a  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #0894d9;">
                      <li><span><?php echo $_SESSION['admin_name'] ?></span></li>
                      <li>Admin</a></li>
                      <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
                    </ul>
        </div>
    </div>
    <!-- top navbar -->

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="admin_home.php" style="color: black;">EE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin_home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admin_product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admin_about.php">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="userdata.php">User Data</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- navbar -->



<!-- about -->
<div class="container" id="about">
    <h1>ABOUT US</h1>

            <p style="text-align: justify;">E-commerce websites have revolutionized the way people buy and sell products and services. These online platforms provide a convenient and efficient means for businesses to reach a global customer base and for consumers to shop from the comfort of their homes. With the advancement of technology and the widespread use of the internet, e-commerce has experienced tremendous growth and has become an integral part of modern-day commerce.<br>

An e-commerce website serves as a virtual storefront where businesses can showcase their products and services. It allows them to provide detailed information, high-quality images, and customer reviews to help potential buyers make informed purchasing decisions. Moreover, e-commerce websites offer various features such as search filters, personalized recommendations, and secure payment gateways, enhancing the overall shopping experience.<br>

For consumers, e-commerce websites offer unparalleled convenience. They can browse through a vast range of products, compare prices, and read reviews, all with just a few clicks. The ability to shop anytime, anywhere has made e-commerce incredibly popular. Furthermore, e-commerce platforms often provide fast and reliable shipping services, making it convenient for consumers to receive their purchases at their doorstep.<br>

In addition to traditional retail products, e-commerce websites have also expanded to include digital goods such as e-books, software, and online courses. This has opened up new opportunities for businesses and individuals to monetize their expertise and reach a global audience.<br>

However, running a successful e-commerce website comes with its challenges. Competition is fierce, and businesses need to invest in digital marketing strategies to attract and retain customers. They must also ensure the security of customer data and provide responsive customer support to maintain trust.<br>

Overall, e-commerce websites have transformed the way we buy and sell products. They have provided businesses with a global reach and consumers with unparalleled convenience. As technology continues to advance, we can expect further innovation and growth in the e-commerce industry.</p>
</div>
<!-- about -->


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
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <p>We are here to delivert products in time!!...</p>
                <ul>
                    <li><a href="#">Luxirious Products</a></li>
                    <li><a href="#">Home Appliance</a></li>
                </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
