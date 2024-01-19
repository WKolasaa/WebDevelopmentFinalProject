<?php
require __DIR__ . '/repository.php';

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
            $products = $statement->fetchAll();
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

    function removeProduct($product) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM products WHERE productID = :productID");

            $stmt->bindValue(':productID', $product->productID);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}