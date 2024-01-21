<?php

use App\Models\Order;
use App\Models\User;

require __DIR__ . '/controller.php';
//require __DIR__ . '/../models/user.php';
require __DIR__ . '/../services/userService.php';

class OrderController extends Controller
{
    public function index() {
        session_start();
        $session = isset($_SESSION['user']);
        $user = new User(0, '', '', '', '', '', '', '', '', '', '', new DateTime, '');

        if (!$session) {
            session_abort();
            header('Location: /login');
        } else {
            $user = $_SESSION['user'];
            //var_dump($user);
            include __DIR__ . '/../views/order/index.php';
        }
    }

    public function handleFormSubmission()
    {
        // Assuming you have form data available
        $userService = new UserService();
        $customerID = $userService->getUserByUserName($_POST['userName'])->userID;
        $totalAmount = $_SESSION['totalPrice'];
        $paymentMethod = $_POST['paymentMethod'];
        $cardNumber = $_POST['cardNumber'];
        $expirationDate = $_POST['expirationDate'];
        $cvv = $_POST['cvv'];
        $createdAT = new DateTime('now');

        $orderService = new OrderService();
        $order = new \App\Models\Order($customerID, $totalAmount, $paymentMethod, $cardNumber, $expirationDate, $cvv, $createdAT);
        $result = $orderService->addOrder($order);

        if ($result) {
            // Display thank you page
            header('Location: /thanks');
        } else {
            // Handle error
            View::render('error_page');
        }
    }
}