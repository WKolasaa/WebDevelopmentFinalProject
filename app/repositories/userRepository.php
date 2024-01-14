<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class userRepository extends Repository
{
    function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByUserName($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createUser($user) {
        try {
            $stmt = $this->connection->prepare("INSERT into users (userID, userName, firstName, lastName, email, password, phoneNumber, address, dateOfBirth, role) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss", $user->getUserID(), $user->getUserName(), $user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPassword(), $user->getPhone(), $user->getAddress(), $user->getDateOfBirth(), $user->getRole());
            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}