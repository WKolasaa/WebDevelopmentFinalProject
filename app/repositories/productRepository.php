<?php
require __DIR__ . '/repository.php';

class ProductRepository extends Repository
{
    function getBiggestId(){
        try {
            $stmt = $this->connection->prepare("SELECT MAX(productID) FROM products");
            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAll(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Product');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}