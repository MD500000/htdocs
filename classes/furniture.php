<?php


include_once 'product.php';

class furniture extends product {
  protected$height;
  protected $length;
  protected $width;

  public function __construct($sku, $name, $price, $height, $length, $width) {
    parent::__construct($sku, $name, $price, $height, $length, $width);
    $this->height = $height;
    $this->length = $length;
    $this->width = $width;
  }


  public function getHeight()
  {
      return $this->height;
  }


  public function getLength()
  {
    return $this->length;
  }


  public function getWidth()
  {
    return $this->width;
  }

  public function setHeight($height) {
    $this->height = $height;
  }

  public function setWidth($width) {
    $this->width = $width;
  }

  public function setLength($length) {
    $this->length = $length;
  }


  public function getDetails() {
    return "Dimensions: " . $this->height . "x" . $this->width . "x" . $this->length;
  }
  
  public function insertIntoDatabase($db) {
    try {
        $stmt = $db->prepare('INSERT INTO furniture (height, width, length) VALUES (?, ?, ?)');
        $stmt->execute([$this->height, $this->width, $this->length]);
        $furnitureId = $db->lastInsertId();

        $stmt = $db->prepare('INSERT INTO main_product (SKU, Name, Price, furniture_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->sku, $this->name, $this->price, $furnitureId]);
    } catch (PDOException $e) {
        error_log('Error inserting data: ' . $e->getMessage());
        die('Error inserting data: ' . $e->getMessage());
    }
}




}
?>