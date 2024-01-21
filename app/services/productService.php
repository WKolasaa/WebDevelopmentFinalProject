<?php
require_once __DIR__ . '/../repositories/productRepository.php';

class productService
{
    public function getBiggestId(){
        $productRepository = new ProductRepository();
        $product = $productRepository->getBiggestId();
        return $product;
    }

    public function getAllProducts(){
        $productRepository = new ProductRepository();
        $products = $productRepository->getAll();
        return $products;
    }

    public function addProduct($product){
        $productRepository = new ProductRepository();
        $result = $productRepository->addProduct($product);
        return $result;
    }

    public function removeProduct($productID){
        $productRepository = new ProductRepository();
        $result = $productRepository->removeProduct($productID);
        return $result;
    }

    public function editProduct($product){
        $productRepository = new ProductRepository();
        $result = $productRepository->updateProduct($product);
        return $result;
    }

    public function getProductByID($productID){
        $productRepository = new ProductRepository();
        $product = $productRepository->updateProduct($productID);
        return $product;
    }
}