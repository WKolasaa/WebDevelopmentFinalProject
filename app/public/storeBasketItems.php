<?php

namespace app\public;
class storeBasketItems
{
    public function index()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = json_decode(file_get_contents("php://input"), true);

            if (isset($postData['basketItems'])) {
                $_SESSION['basketItems'] = $postData['basketItems'];
                echo 'Basket items stored successfully!';
            } else {
                http_response_code(400); // Bad Request
                echo 'Invalid request data';
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo 'Method not allowed';
        }


    }
}