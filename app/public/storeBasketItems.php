<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);

    if (isset($postData['basketItems'])) {
        // Retrieve existing basket items or initialize an empty array
        $basketItems = $_SESSION['basketItems'] ?? [];

        // Append new items to the existing basket items
        $basketItems = array_merge($basketItems, $postData['basketItems']);

        // Store the updated basket items in the session
        $_SESSION['basketItems'] = $basketItems;

        $totalPrice = 0;

        foreach ($basketItems as $item) {
            $totalPrice += $item['productPrice'];
        }

        $_SESSION['totalPrice'] = $totalPrice;

        echo 'Basket items stored successfully!';
    } else {
        http_response_code(400); // Bad Request
        echo 'Invalid request data';
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo 'Method not allowed';
}
?>
