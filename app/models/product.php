<?php

namespace App\Models;

class Product
{
    public int $productID;
    public string $productName;
    public string $productDescription;
    public float $productPrice;
    public string $productImage;
    public int $productQuantity;

    public function __construct(int $productID, string $productName, string $productDescription, float $productPrice, int $productQuantity, string $productImage)
    {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
        $this->productQuantity = $productQuantity;
        $this->productImage = $productImage;
    }

    public function getProductID(): int
    {
        return $this->productID;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getProductDescription(): string
    {
        return $this->productDescription;
    }

    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    public function getProductImage(): string
    {
        return $this->productImage;
    }

    public function getProductQuantity(): int
    {
        return $this->productQuantity;
    }

    public function setProductImage(string $productImage): void
    {
        $this->productImage = $productImage;
    }
}