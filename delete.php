<?php
// Check if the IDs array is set and not empty
if (isset($_POST['ids']) && !empty($_POST['ids'])) {
  
  // Connect to your database
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

  // Construct a string of comma-separated IDs to use in the query
  $ids = implode(',', $_POST['ids']);

  // Construct the DELETE query using the IDs string
  $sql = "DELETE FROM main_product WHERE id IN ($ids)";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    // If the query was successful, return a success message
    echo "Selected products have been deleted.";
  } else {
    // If the query failed, return an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
} else {
  // If the IDs array is empty, return an error message
  echo "No products were selected for deletion.";
}
?>
