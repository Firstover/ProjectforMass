<?php
$product_id = "";
$name = "";
$information = "";
$type_product = "";
$branch_code = "";
$price = "";
$amount = "";

$SuccessMessage = "";
$conn = mysqli_connect('localhost','root','','storage');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["product_id"])){
        header("location: index.php");
        exit;
    };

    $product_id = $_GET["product_id"];

    $sql = "SELECT * FROM product WHERE product_id=$product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: index.php");
        exit;
    }
    
    $product_id = $row["product_id"];
    $name = $row["name"];
    $information = $row["information"];
    $type_product = $row["type_product"];
    $branch_code = $row["branch_code"];
    $price = $row["price"];
    $amount = $row["amount"];
}
    else{
        $product_id = $_POST["product_id"];
        $name = $_POST['name'];
        $type_product = $_POST['type_product'];
        $information = $_POST['information'];
        $branch_code = $_POST['branch_code'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];

        $sql = "UPDATE product " . "SET name = '$name', type_product = '$type_product',
        information = '$information', branch_code = '$branch_code', price = '$price', amount = '$amount' " .
        "WHERE product_id = $product_id";
        $result = $conn->query($sql);
        $SuccessMessage = "Product has been edited!";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mass</title>

    <script src="jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

    <body>
    <br>
    <h1 style="padding-left:3%;">Project Mass</h1>


    <form style="margin:3%;" method="post">
    <input type="hidden" value="<?php echo $product_id;?>" name="product_id">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name;?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Type</label>
      <select class="form-control" name="type_product" required>
        <option value="" disabled="" selected="">Select Type</option>
        <option value="smartphone">Smartphone</option>
        <option value="furniture">Furniture</option>
        <option value="laptop">Laptop</option>
    </select>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault05">Price</label>
      <input type="number" class="form-control" name="price" value="<?php echo $price;?>" placeholder="Price" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault05">Amount</label>
      <input type="number" class="form-control" name="amount" value="<?php echo $amount;?>" placeholder="Amount" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationDefault03">Information</label>
      <input type="text" class="form-control" name="information" value="<?php echo $information;?>" placeholder="Information" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault04">Branch Code</label>
      <input type="number" class="form-control" name="branch_code" value="<?php echo $branch_code;?>" placeholder="Branch Code" required>
    </div>
  </div>
  <br>
  <a href="index.php" class="btn btn-primary" style="margin-right:1%;">&laquo; Back</a>
  <button class="btn btn-primary" type="submit">Save</button>
</form>
<?php
    if(!empty($SuccessMessage)){
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' style='margin:3%;'>
        $SuccessMessage
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        ";
    };
?>
  </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>