<?php

//database connection

require_once 'classes/product.php';
require_once 'classes/dvd.php';
require_once 'classes/book.php';
require_once 'classes/furniture.php';


$servername = "localhost";
$username = "id20595560_root";
$password = "<qq4r1_PAl{zE-=/";
$dbname = "id20595560_test_schema";



try{

    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch(PDOException $e)

{

    echo "Connection failed: " .$e->getMessage();
}






if(isset($_POST['Save'])) {

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];


    $sql = "SELECT * FROM main_product WHERE sku=:sku";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['sku' => $sku]);

if ($stmt->rowCount() > 0) {
  // SKU already exists, show an error message and exit
  echo "<script>alert('SKU already exists. Please enter a different SKU.'); window.location.href='addproduct.php';</script>";
  exit;
}

  if ($_POST['productType'] == 'Book') {
    $weight = $_POST['weight'];
    $product = new Book($sku, $name, $price, $weight);
    $product->insertIntoDatabase($conn);
    header('Location: index.php');
    exit();
} elseif ($_POST['productType'] == 'DVD') {
    $size = $_POST['size'];
    $product = new DVD($sku, $name, $price, $size);
    $product->insertIntoDatabase($conn);
    header('Location: index.php');
    exit();
} elseif ($_POST['productType'] == 'Furniture') {
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $product = new Furniture($sku, $name, $price, $height, $width, $length);
    $product->insertIntoDatabase($conn);
    header('Location: index.php');
    exit();
} else {
    // handle invalid product type
}

}





  
?>