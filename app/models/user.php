<?php
namespace App\Models;

use DateTime;

class user
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_MOD = 'mod';
    private  int $userID;
    private  string $userName;
    private  string $firstName;
    private  string $lastName;
    private  string $email;
    private  string $password;
    private  string $phone;
    private  string $address;
    private  DateTime $dateOfBirth;
    private string $role;


    public function __construct(int $userID, string $userName, string $firstName, string $lastName, string $email, string $password, string $phone, string $address, DateTime $dateOfBirth, string $role)
    {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->address = $address;
        $this->dateOfBirth = $dateOfBirth;
        $this->role = $role;
    }
    public function getUserID(): int
    {
        return $this->userID;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }
    public function getFullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }
    public function getRole(): string
    {
        return $this->role;
    }

}