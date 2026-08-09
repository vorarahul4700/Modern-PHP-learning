<?php

// Union Types
// A function that accepts an integer or float, and returns an integer or float
class Product{
    private int|float $price;

    public function setPrice(int|float $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function displayPrice()
    {
        echo $this->price;
    }
}

$product = new Product();
$product->setPrice(10);
$product->displayPrice();


// Nullable Types
// A function that accepts an integer or float or null, and returns an integer or float
class NullableProduct{
    private int|float|null $price;

    public function setPrice(?int $price): ?int
    {
        $price = is_null($price) ? 500 : $price;
        $this->price = $price;
        return $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function displayPrice()
    {
        echo $this->price;
    }
}

$nullableProduct = new NullableProduct();
$nullableProduct->setPrice(10);
$nullableProduct->setPrice(null);
$nullableProduct->displayPrice();
