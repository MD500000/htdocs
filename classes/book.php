<?php


include_once 'product.php';

class book extends product {
  protected $weight;

  public function __construct($sku, $name, $price, $weight) {
    parent::__construct($sku, $name, $price, $weight);
    $this->weight = $weight;
  }


  public function getWeight()
  {
      return $this->weight;
  }


  public function setWeight($weight) {
    $this->weight = $weight;
  }


  public function getDetails() {
    return "Weight: " . $this->weight . " lbs";
  }

  public function insertIntoDatabase($db) {
    try {
        $stmt = $db->prepare('INSERT INTO book (weight) VALUES (?)');
        $stmt->execute([$this->weight]);
        $bookId = $db->lastInsertId();

        $stmt = $db->prepare('INSERT INTO main_product (SKU, Name, Price, book_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->sku, $this->name, $this->price, $bookId]);
    } catch (PDOException $e) {
        error_log('Error inserting data: ' . $e->getMessage());
        die('Error inserting data: ' . $e->getMessage());
    }
}

}
?>