<?php
require __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/productService.php';

class ProductController extends Controller
{
    public function index(){
        $productService = new ProductService();
        $products = $productService->getAllProducts();
        include __DIR__ . '/../views/product/index.php';
    }
}