<?php

use App\Models\Product;
//require_once __DIR__ . '/../../models/product.php';

require __DIR__ . '/../../services/productService.php';

class AddController
{
    private $productService;

    // Initialize services
    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $newService = new ProductService();
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                $price = htmlspecialchars($_POST['price']);
                $quantity = htmlspecialchars($_POST['quantity']);

                $product = new Product(
                    $newService->getBiggestId() + 1,
                    $title,
                    $description,
                    $price,
                    $quantity,
                    ''
                );


                //var_dump($product);
                // Handle the image upload
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array($imageFileType, $allowedTypes)) {
                        $targetDirectory = "media/";
                        $targetFile = $targetDirectory . basename($_FILES['image']['name']);
                        if (!file_exists($targetFile)) {
                            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                                echo "The file " . htmlspecialchars(basename($_FILES['image']['name'])) . " has been uploaded.";
                                $product->setProductImage($targetFile); // Set the image path in the Recipe object
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            echo "Sorry, file already exists.";
                        }
                    } else {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }

                // Call the recipe service to insert the recipe
                $result = $this->productService->addProduct($product);
                if ($result) {
                    echo 'Product added successfully';
                } else {
                    http_response_code(500);
                    echo 'Error adding recipe';
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo 'Server error: ' . $e->getMessage();
            }
        } else {
            http_response_code(405);
            echo 'Method not allowed';
        }
    }
}
?>
