<?php
require __DIR__ . '/../../services/productService.php';


class EditController
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }


    public function index(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                // Retrieve data from the request
                $productID = htmlspecialchars($_POST['productID']);
                $productName = htmlspecialchars($_POST['productName']) ?? '';
                $productDescription = htmlspecialchars($_POST['productDescription']) ?? '';
                $productPrice = htmlspecialchars($_POST['productPrice']) ?? '';
                $productQuantity = htmlspecialchars($_POST['productQuantity']) ?? '';

                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array($imageFileType, $allowedTypes)) {
                        $targetDirectory = "media/";
                        $targetFile = $targetDirectory . basename($_FILES['image']['name']);
                        if (!file_exists($targetFile)) {
                            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                                echo "The file " . htmlspecialchars(basename($_FILES['image']['name'])) . " has been uploaded.";

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

                $product = $this->productService->getProductByID($productID);
                if (!$product) {
                    http_response_code(404); // Not Found
                    echo 'Product not found';
                    return;
                }

                $product->setProductName($productName);
                $product->setProductDescription($productDescription);
                $product->setProductPrice($productPrice);
                $product->setProductQuantity($productQuantity);
                if(isset($targetFile)){
                    $product->setProductImage($targetFile);
                }

                // Update the recipe in the database
                $result = $this->productService->editProduct($product);
                if ($result) {
                    echo 'Recipe updated successfully';
                } else {
                    http_response_code(500); // Internal Server Error
                    echo 'Error updating product';
                }
            } catch (Exception $e) {
                http_response_code(500); // Internal Server Error
                echo 'Server error: ' . $e->getMessage();
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo 'Method not allowed';
        }
    }
}