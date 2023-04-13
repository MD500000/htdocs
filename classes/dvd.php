<?php

include_once 'product.php';

class dvd extends product {
  protected $size;

  public function __construct($sku, $name, $price, $size) {
    parent::__construct($sku, $name, $price);
    $this->size = $size;
  }

  public function getSize()
  {
      return $this->size;
  }
  

  public function setSize($size) {
    $this->size = $size;
  }


  public function getDetails() {
    return "Size: " . $this->size . " MB";
  }


  public function insertIntoDatabase($db) {
    try {
        $stmt = $db->prepare('INSERT INTO dvd (size) VALUES (?)');
        $stmt->execute([$this->size]);
        $dvdId = $db->lastInsertId();

        $stmt = $db->prepare('INSERT INTO main_product (SKU, Name, Price, dvd_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->sku, $this->name, $this->price, $dvdId]);
    } catch (PDOException $e) {
        error_log('Error inserting data: ' . $e->getMessage());
        die('Error inserting data: ' . $e->getMessage());
    }
}


}
?>