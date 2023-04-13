<?php

abstract class Product {
    protected $sku;
    protected $name;
    protected $price;
  
    public function __construct($sku, $name, $price) {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
   }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName() {
      return $this->name;
    }
  
    public function getPrice() {
      return $this->price;
    }


    // Abstract method to be implemented by concrete subclasses
  abstract public function getDetails();
  
  // Common method to retrieve the type of the product
  public function getType() {
    return get_class($this);
  }


  }

?>