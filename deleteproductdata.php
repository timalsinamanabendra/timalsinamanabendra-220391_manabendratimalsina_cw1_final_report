<?php
@include 'config.php';

if(!isset($_SESSION['customer_name'])){
   header('location:login.php');
};
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "DELETE FROM `buy_detail` WHERE product_id = '$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>alert('Product deleted');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Failed to delete user');</script>";
    }

    // Redirect back to the userdata.php page after deletion
    header('Location: buyproductlist.php');
}
?>


