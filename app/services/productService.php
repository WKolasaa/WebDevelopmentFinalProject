<?php

use App\Models\Product;

require_once __DIR__ . '/../repositories/productRepository.php';

class productService
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }


    public function getBiggestId(){
        $product = $this->productRepository->getBiggestId();
        return $product;
    }

    public function getAllProducts(){
        $products = $this->productRepository->getAll();
        return $products;
    }

    public function addProduct($product){
        $result = $this->productRepository->addProduct($product);
        return $result;
    }

    public function removeProduct($productID){
        $result = $this->productRepository->removeProduct($productID);
        return $result;
    }

    public function editProduct($product){
        $result = $this->productRepository->updateProduct($product);
        return $result;
    }

    public function getProductByID($productID) {
        try {
            $product = $this->productRepository->getProductByID($productID);

            // Check if a product is found and return an instance of Product
            if ($product) {
                return new Product(
                    $product->productID,
                    $product->productName,
                    $product->productDescription,
                    $product->productPrice,
                    $product->productQuantity,
                    $product->productImage
                );
            }

            return null; // Return null if no product is found
        } catch (Exception $e) {
            throw new Exception('Error getting product by ID: ' . $e->getMessage());
        }
    }


}