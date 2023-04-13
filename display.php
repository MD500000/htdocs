<?php


require_once 'classes/product.php';
require_once 'classes/dvd.php';
require_once 'classes/book.php';
require_once 'classes/furniture.php';


$servername = "localhost";
$username = "id20595560_root";
$password = "<qq4r1_PAl{zE-=/";
$dbname = "id20595560_test_schema";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $stmt = $conn->prepare("SELECT main_product.ID, main_product.SKU, main_product.Name, main_product.Price,
                                    dvd.size AS dvd_size,
                                    furniture.height AS furniture_height, furniture.width AS furniture_width, furniture.length AS furniture_length,
                                    book.weight AS book_weight
                              FROM main_product
                              LEFT JOIN dvd ON main_product.dvd_id = dvd.dvd_id
                              LEFT JOIN furniture ON main_product.furniture_id = furniture.furniture_id
                              LEFT JOIN book ON main_product.book_id = book.book_id");
    $stmt->execute();
  
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    foreach ($result as $row) {
        echo "<div class='test-boxes'>
        <input type='checkbox' class='delete-checkbox' name='product_ids[]' value='" .$row['ID'] . "'>";
        echo "<table class='product-tbl'>";
        echo "<tr> <td> " . $row['SKU'] . "</tr> </td>";
        echo "<tr> <td> " . $row['Name'] . "</tr> </td>";
        echo "<tr> <td> " . $row['Price'] . ".00 $</tr> </td>";
        
        if (!empty($row["dvd_size"])) {
            echo "<tr> <td> Size : " . $row['dvd_size'] . " MB</tr> </td>";
        } else if (!empty($row["furniture_height"])) {
            echo "<tr> <td> Dimensions: " .$row["furniture_height"]. "x" .$row["furniture_width"]. "x" .$row["furniture_length"]. " cm </tr> </td>";
        } else if (!empty($row["book_weight"])) {
            echo "<tr> <td> Weight : " . $row['book_weight'] . " KG </tr> </td>";
        }
        echo "</table>";
        echo "</div>";
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;


?>