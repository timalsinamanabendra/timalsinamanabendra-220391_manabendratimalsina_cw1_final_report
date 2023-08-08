<?php
// config.php
@include 'config.php';
if(!isset($_SESSION['seller_name'])){
   header('location:login.php');
};

function getUserData($conn, $product_id) {
    $query = "SELECT * FROM `images` WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return false;
}

if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $query = "UPDATE `images` SET product_name='$product_name', description='$description', price='$price' WHERE product_id='$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>alert('Data updated');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Data Not updated');</script>";
    }

    header('Location: myproduct.php');
}

?>

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
          if (isset($_GET['product_id'])) {
              $product_id = $_GET['product_id'];
              $productData = getUserData($conn, $product_id);
          }
          ?>
          <form method="POST" action="myproduct.php?product_id=<?php echo $product_id; ?>">
                <div class="txt_field">
                    <input type="text" name="product_name" required value="<?php echo isset($productData['product_name']) ? htmlspecialchars($productData['product_name']) : ''; ?>">
                    <label>Product Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="description" required value="<?php echo isset($productData['description']) ? htmlspecialchars($productData['description']) : ''; ?>">
                    <label>Description</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="price" required value="<?php echo isset($productData['price']) ? htmlspecialchars($productData['price']) : ''; ?>">
                    <label>Price</label>
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
