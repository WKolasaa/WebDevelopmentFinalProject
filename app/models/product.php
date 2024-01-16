<?php

namespace App\Models;

class Product
{
    private int $productID;
    private string $productName;
    private string $productDescription;
    private float $productPrice;
    private string $productImage;
    private int $productQuantity;

    public function __construct(int $productID, string $productName, string $productDescription, float $productPrice, string $productImage, int $productQuantity)
    {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage;
        $this->productQuantity = $productQuantity;
    }
}