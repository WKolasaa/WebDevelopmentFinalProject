<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/productService.php';

class RemoveController extends Controller
{
    public function index()
    {
        $productService = new productService();
        $products = $productService->getAllProducts();
        include __DIR__ . '/../views/remove/index.php';
    }

    public function remove()
    {
        $productService = new productService();
        $product = $productService->getProductById($_POST['productID']);
        $productService->removeProduct($product);
        header('Location: /remove');
    }
}