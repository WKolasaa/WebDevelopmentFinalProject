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

            $stmt->bindValue(':userName', $user->userName);
            $stmt->bindValue(':firstName', $user->firstName);
            $stmt->bindValue(':lastName', $user->lastName);
            $stmt->bindValue(':email', $user->email);
            $stmt->bindValue(':password', $user->password);
            $stmt->bindValue(':phone', $user->phone);
            $stmt->bindValue(':address', $user->address);
            $stmt->bindValue(':address2', $user->address2);
            $stmt->bindValue(':country', $user->country);
            $stmt->bindValue(':zip', $user->zip);
            $dateString = $user->dateOfBirth->format('Y-m-d');
            $stmt->bindValue(':dateOfBirth', $dateString);
            $stmt->bindValue(':role', $user->role);

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