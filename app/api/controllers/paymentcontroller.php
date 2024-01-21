<?php

use App\Models\Order;

require __DIR__ . '/../../services/orderService.php';

class paymentcontroller
{
    private $orderService;
    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submitOrder"])) {
            // Create a new instance of the Order class
            $order = new Order(htmlspecialchars($_SESSION['userClass']->getUserID()), htmlspecialchars($_SESSION['totalPrice']), htmlspecialchars($_POST['paymentMethod']), htmlspecialchars($_POST['cardNumber']), htmlspecialchars($_POST['expirationDate']), htmlspecialchars($_POST['cvv']), new DateTime('now'));

            $this->orderService->addOrder($order);

            header("Location: ?action=thanks");
            exit();
        }
    }
}