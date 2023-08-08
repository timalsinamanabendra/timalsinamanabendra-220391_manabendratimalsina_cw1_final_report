<?php
@include 'config.php';

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
};
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Delete the user with the specified user_id from the database
    $query = "DELETE FROM `signup` WHERE user_id = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>alert('User deleted');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Failed to delete user');</script>";
    }

    // Redirect back to the userdata.php page after deletion
    header('Location: userdata.php');
}
?>


