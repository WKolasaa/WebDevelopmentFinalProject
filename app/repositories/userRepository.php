<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{
    function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\User');
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByUserName($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE userName = :userName");
            $stmt->bindParam(':userName', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createUser($userName, $firstName, $lastName, $email, $password, $phone, $address, $dateOfBirth, $role) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (userName, firstName, lastName, email, password, phone, address, dateOfBirth, role) VALUES (:userName, :firstName, :lastName, :email, :password, :phone, :address, :dateOfBirth, :role)");

            $stmt->bindValue(':userName', $userName);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':dateOfBirth', $dateOfBirth);
            $stmt->bindValue(':role', $role);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    function getBiggestId(){
        try {
            $stmt = $this->connection->prepare("SELECT MAX(userID) FROM users");
            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}