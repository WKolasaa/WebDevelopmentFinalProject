<?php
require __DIR__ . '/repository.php';
use App\Models\order;

class orderRepository extends Repository
{
    public function addOrder($order){
        try {
            $stmt = $this->connection->prepare("INSERT INTO orders (orderID, userID, totalAmount, paymentMethod, cardNumber, expirationDate, evv, createdAT) VALUES (:orderID, :userID, :totalAmount, :paymentMethod, :cardNumber, :expirationDate, :evv, :createdAT)");

            $stmt->bindValue(':orderID', $order->getOrderID());
            $stmt->bindValue(':userID', $order->getUserID());
            $stmt->bindValue(':totalAmount', $order->getTotalAmount());
            $stmt->bindValue(':paymentMethod', $order->getPaymentMethod());
            $stmt->bindValue(':cardNumber', $order->getCardNumber());
            $stmt->bindValue(':expirationDate', $order->getExpirationDate());
            $stmt->bindValue(':evv', $order->getEvv());
            $stmt->bindValue(':createdAT', $order->getCreatedAT());

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}