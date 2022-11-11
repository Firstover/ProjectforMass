<?php

if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];
    $conn = new mysqli('localhost','root','','storage');

    $sql = "DELETE FROM product WHERE product_id=$product_id";
    $conn->query($sql);
}

header("location: index.php");
exit;

?>