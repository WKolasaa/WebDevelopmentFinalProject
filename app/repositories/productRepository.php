<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/product.php';
use App\Models\Product;

class ProductRepository extends Repository
{
    function getBiggestId(){
        try {
            $stmt = $this->connection->prepare("SELECT MAX(productID) FROM products");
            $stmt->execute();

            // Fetch the result
            $maxId = $stmt->fetchColumn();

            return $maxId !== false ? $maxId : 0; // Return 0 if fetchColumn fails

        } catch (PDOException $e) {
            echo $e;
            return 0; // Return 0 in case of an exception
        }
    }

    function getAll(){
        try {
            $statement = $this->connection->prepare("SELECT * FROM products");
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $productDataArray = $statement->fetchAll();

            // Transform associative arrays into Product objects
            $products = array_map(function($productData) {
                return new Product(
                    $productData['productID'],
                    $productData['productName'],
                    $productData['productDescription'],
                    $productData['productPrice'],
                    $productData['productQuantity'],
                    $productData['productImage']
                );
            }, $productDataArray);

            return $products;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function addProduct($product) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO products (productID, productName, productDescription, productPrice, productQuantity,productImage) VALUES (:productID, :productName, :productDescription, :productPrice, :productQuantity, :productImage)");

            $stmt->bindValue(':productID', $product->productID);
            $stmt->bindValue(':productName', $product->productName);
            $stmt->bindValue(':productDescription', $product->productDescription);
            $stmt->bindValue(':productPrice', $product->productPrice);
            $stmt->bindValue(':productQuantity', $product->productQuantity);
            $stmt->bindValue(':productImage', $product->productImage);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function removeProduct($productID) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM products WHERE productID = ?");

            return $stmt->execute([$productID]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getProductByID($productID){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE productID = ?");
            $stmt->execute([$productID]);

            $stmt->setFetchMode(PDO::FETCH_OBJ); // Set the fetch mode to object
            $product = $stmt->fetch();
            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function updateProduct($product) {
        try {
            $stmt = $this->connection->prepare("UPDATE products SET productName = :productName, productDescription = :productDescription, productPrice = :productPrice, productQuantity = :productQuantity, productImage = :productImage WHERE productID = :productID");

            $stmt->bindValue(':productID', $product->getProductID());
            $stmt->bindValue(':productName', $product->getProductName());
            $stmt->bindValue(':productDescription', $product->getProductDescription());
            $stmt->bindValue(':productPrice', $product->getProductPrice());
            $stmt->bindValue(':productQuantity', $product->getProductQuantity());
            $stmt->bindValue(':productImage', $product->getProductImage());

            if ($stmt->execute()) {
                return true;
            } else {
                // Check for errors
                echo "Error: " . implode(" ", $stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}