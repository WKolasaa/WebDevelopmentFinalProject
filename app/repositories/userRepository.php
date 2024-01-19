<?php

use App\Models\user;

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

    function createUser($user) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (userName, firstName, lastName, email, password, phone, address, address2, country, zip, dateOfBirth, role) VALUES (:userName, :firstName, :lastName, :email, :password, :phone, :address, :address2, :country, :zip, :dateOfBirth, :role)");

            $stmt->bindValue(':userName', $user->getUserName());
            $stmt->bindValue(':firstName', $user->getFirstName());
            $stmt->bindValue(':lastName', $user->getLastName());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPassword());
            $stmt->bindValue(':phone', $user->getPhone());
            $stmt->bindValue(':address', $user->getAddress());
            $stmt->bindValue(':address2', $user->getAddress2());
            $stmt->bindValue(':country', $user->getCountry());
            $stmt->bindValue(':zip', $user->getZip());
            $dateString = $user->getDateOfBirth()->format('Y-m-d');
            $stmt->bindValue(':dateOfBirth', $dateString);
            $stmt->bindValue(':role', $user->getRole());

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