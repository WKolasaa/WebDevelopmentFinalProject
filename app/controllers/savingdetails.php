<?php
// process_order.php

use App\Models\Order;
use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract payment details from the POST request
    $paymentMethod = $_POST['paymentMethod'];
    $ccNumber = $_POST['cc-number'];
    $ccExpiration = $_POST['cc-expiration'];
    $ccCvv = $_POST['cc-cvv'];

    $user = $_SESSION['userID'];
    $userID = $user->getUserID();

    $order = new Order(0, $userID, $_SESSION['totalPrice'], $paymentMethod, $ccNumber, $ccExpiration, $ccCvv, date('Y-m-d H:i:s'));

    $orderService = new OrderService();
    $orderService->addOrder($order);

    session_abort();

    header('Location: /thanks');
    exit();
} else {
    // Handle invalid requests
    http_response_code(400); // Bad Request
    echo 'Invalid request method';
}
?>
