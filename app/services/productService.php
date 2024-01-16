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
}