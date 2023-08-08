
<?php
@include 'config.php';


if(isset($_POST['submit'])){
$user_id= $_SESSION['user_id'];
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pnumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
$password = md5($_POST['password']);
$usertype = 'customer';

$select = "SELECT * FROM signup where email ='$email' && password = '$password'";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }
   else{
    $insert ="INSERT INTO signup(firstname, lastname, email, pnumber, password, usertype) VALUES('$firstname','$lastname','$email','$pnumber','$password','$usertype')";
    mysqli_query($conn, $insert);
    header('location: Signup view.php');

    }

};




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
        .password-strength {
    font-size: 14px;
    margin-top: 5px;
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
    </div>
    <!-- top navbar -->

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="home.php" style="color: black;">EE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                </ul>
               
              </div>
            </div>
          </nav>
        <!-- navbar -->


        <!-- login -->
        <form action="" method="post">
        <div class="container login">
            <div class="row">
                <div class="col-md-4" id="side1">
                    <h3>WELCOME</h3>
                    <p>PLEASE FILL THE FORM TO CREATE YOUR ACCOUNT</p>
                </div>
                <div class="col-md-8" id="side2">
                    <h3>Create Account</h3>
                    <div class="inp">
                        <input type="text" placeholder="First Name" name="firstname" required>
                        <input type="text" placeholder="Last Name" name="lastname" required>
                        <input type="email" placeholder="Enter Your Email" name="email" required>
                        <input type="tel" name="pnumber" placeholder="Enter Your Phone Number"required>
                        <input type="password" placeholder="Enter New Password" name="password"  required oninput="checkPasswordStrength(this.value)"><br>
                         <div id="password-strength" class="password-strength"></div>
                        </div>
                        
                    <div id="login"><button type="submit" name="submit" VALUES="register now">SIGN UP</button></div>
                </div>
            </div>
        </div>
    </div>
        </form>
        <!-- login -->


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
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Privacy policay</a></li>
                </ul>
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

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>



<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
 function checkPasswordStrength(password) {
    const passwordStrengthText = document.getElementById('password-strength');

    // Regular expressions for password strength checks
    const containsLowercase = /[a-z]/.test(password);
    const containsUppercase = /[A-Z]/.test(password);
    const containsDigit = /\d/.test(password);
    const containsSpecialChar = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);

    // Calculate password strength score
    let score = 0;
    if (containsLowercase) score++;
    if (containsUppercase) score++;
    if (containsDigit) score++;
    if (containsSpecialChar) score++;

    // Provide feedback to the user based on the password strength score
    let strengthText = "";
    if (score === 0) {
        strengthText = "Weak: Password must contain at least one lowercase letter, one uppercase letter, one number, and one symbol.";
    } else if (score === 1 || score === 2) {
        strengthText = "Moderate: Password could be stronger with more diverse characters.";
    } else if (score === 3) {
        strengthText = "Strong: Password meets most security requirements.";
    } else if (score === 4) {
        strengthText = "Very Strong: Password meets all security requirements.";
    }

    passwordStrengthText.textContent = `Password Strength: ${strengthText}`;
}


    </script>

</body>
</html>
