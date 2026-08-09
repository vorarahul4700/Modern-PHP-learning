<?php
// Magento Style Typed Properties
    class Product{
        private $name;
        private $price;
        private $qty;

        public function __construct($name, $price, $qty)
        {
            $this->name = $name;
            $this->price = $price;
            $this->qty = $qty;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getQty()
        {
            return $this->qty;
        }
    }

    $product = new Product("Product 1", 10.0, 100);
    echo "{$product->getName()} {$product->getPrice()} {$product->getQty()}";
?>


<!-- Modern PHP style Enforced At Assignemnt -->
 <?php
    class EnforcedProduct{
        private string $name;
        private float $price;
        private int $qty;

        public function __construct($name, $price, $qty)
        {
            $this->name = $name;
            $this->price = $price;
            $this->qty = $qty;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getQty()
        {
            return $this->qty;
        }
    }

    $product = new EnforcedProduct("EnforcedProduct 1", 10.0, 100);
    echo "{$product->getName()} {$product->getPrice()} {$product->getQty()}";
?>