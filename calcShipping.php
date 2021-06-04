<?php


class Product
{
    private $price;
    private $weight;
    private $freeShipping = false;

    public function __construct($price, $weight)
    {
        $this->weight = $weight;
        $this->price = $price;
    }


    function getWeight()
    {
        return $this->weight;
    }

    function setFreeShipping()
    {
        $this->freeShipping = true;
    }

    function getFreeShipping()
    {
        return $this->freeShipping;
    }
}

class Shipping
{
    private $totalShipping;
    private $products;
    private $pricePerKilogram;

    public function __construct($pricePerKilogram)
    {
        $this->pricePerKilogram = $pricePerKilogram;
    }

    public function addProducts(Product $product)
    {
        $this->products[] = $product;
    }

    public function calculateTotalShipping()
    {
        foreach ($this->products as $product) {

            if (!$product->getFreeShipping()) {
                $this->totalShipping += $product->getWeight() * $this->pricePerKilogram;
            }
        }
    }

    public function getTotalShippingPrice()
    {
        return $this->totalShipping;
    }
}


// CONTROLLER

$product = new Product(5, 1);
$product1 = new Product(8, 2);
$product2 = new Product(3, 3);
$product2->setFreeShipping();


$pricePerKilogram = 5;

$shipping = new Shipping($pricePerKilogram);

$shipping->addProducts($product);
$shipping->addProducts($product1);
$shipping->addProducts($product2);

$shipping->calculateTotalShipping();

$totalShippingPrice = $shipping->getTotalShippingPrice();

var_dump($totalShippingPrice);
