<?php

namespace App\Models;

class Order
{
    private $orderID;
    private $userID;
    private $totalAmount;
    private $paymentMethod;
    private $cardNumber;
    private $expirationDate;
    private $cvv;
    private $createdAT;

    public function __construct($userID, $totalAmount, $paymentMethod, $cardNumber, $expirationDate, $cvv, $createdAT)
    {
        $this->userID = $userID;
        $this->totalAmount = $totalAmount;
        $this->paymentMethod = $paymentMethod;
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
        $this->createdAT = $createdAT;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }
    public function getUserID()
    {
        return $this->userID;
    }
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }
    public function getCardNumber()
    {
        return $this->cardNumber;
    }
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
    public function getEvv()
    {
        return $this->cvv;
    }
    public function getCreatedAT()
    {
        return $this->createdAT;
    }
}