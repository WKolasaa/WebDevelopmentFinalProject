<?php

use App\Models\Product;
require __DIR__ . '/../../services/productService.php';

class DeleteController
{
    public function __construct()
    {

    }

    public function index()
    {
        $productService = new ProductService();
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $productID = $_GET['productID'] ?? null; // Retrieve the ID from the query string

            if (!$productID) {
                http_response_code(400); // Bad Request
                echo 'No recipe ID provided';
                return;
            }

            try {
                $result = $this->$productService->removeProduct($productID);
                if ($result) {
                    http_response_code(204); // No Content (successful deletion)
                } else {
                    http_response_code(404); // Not Found (recipe not found)
                }
            } catch (Exception $e) {
                http_response_code(500); // Internal Server Error
                echo 'Server error: ' . $e->getMessage();
            }
        } else {
            http_response_code(405); // Method Not Allowed
        }
    }
}
