<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/productService.php';
class AddController extends Controller
{
    public function index(){
        $productService = new productService();
        $data = $productService->getAllProducts();
        require __DIR__ . '/../views/addProduct/index.php';
    }
}