<?php
// config.php
@include 'config.php';
if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
};

if(isset($_POST['update'])){
     header('Location: userdata.php');

}
// Function to get user data from the database based on user_id
function getUserData($conn, $user_id) {
    $query = "SELECT * FROM `signup` WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return false;
}

if (isset($_POST['update'])) {
    $user_id = $_GET['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $query = "UPDATE `signup` SET firstname='$firstname', lastname='$lastname', email='$email', pnumber='$pnumber' WHERE user_id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>alert('Data updated');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Data Not updated');</script>";
    }
}

?>

<!-- edit page of user data -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="updateformdata"> 
      <div class="center">
          <h1>Update Data</h1>
          <?php
          // Fetch the user data based on the provided user_id
          if (isset($_GET['user_id'])) {
              $user_id = $_GET['user_id'];
              $userData = getUserData($conn, $user_id);
          }
          ?>
          <form method="POST" action="userupdatedata.php?user_id=<?php echo $user_id; ?>">
                <div class="txt_field">
                    <input type="text" name="firstname" required value="<?php echo isset($userData['firstname']) ? $userData['firstname'] : ''; ?>">
                    <label>First Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="lastname" required value="<?php echo isset($userData['lastname']) ? $userData['lastname'] : ''; ?>">
                    <label>Last Name</label>
                </div>
                <div class="txt_field">
                    <input type="email" name="email" required value="<?php echo isset($userData['email']) ? $userData['email'] : ''; ?>">
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="tel" name="pnumber" required value="<?php echo isset($userData['pnumber']) ? $userData['pnumber'] : ''; ?>">
                    <label>Phone Number</label>
                </div>

            <button type="submit" name="update" value="Update">Update</button>
          </form>
      </div>
  </div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </body>
</html>
