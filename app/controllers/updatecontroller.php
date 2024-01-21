<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/productService.php';

class UpdateController extends Controller
{
    public function index()
    {
        $productService = new productService();
        $products = $productService->getAllProducts();
        include __DIR__ . '/../views/update/index.php';
    }
}