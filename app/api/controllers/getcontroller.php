<?php
require __DIR__ . '/../../services/productService.php';
use App\Models\Product;

class GetController
{
    private $productService;

    // Initialize services
    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productID = $_GET['productID'] ?? null; // Retrieve the ID from the query string

            if (!$productID) {
                http_response_code(400); // Bad Request
                echo 'No product ID provided';
                return;
            }

            try {
                $product = $this->productService->getProductByID($productID);
                if (!$product) {
                    http_response_code(404); // Not Found
                    echo json_encode(['error' => 'Product not found']);
                    return;
                }

                http_response_code(200); // OK
                echo json_encode($product); // Assuming $recipe is already in a format that can be converted to JSON
            } catch (Exception $e) {
                http_response_code(500); // Internal Server Error
                echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
            }
        }
    }
}

