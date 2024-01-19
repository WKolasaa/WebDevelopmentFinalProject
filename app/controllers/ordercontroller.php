<?php

use App\Models\User;

require __DIR__ . '/controller.php';
require __DIR__ . '/../models/user.php';

class OrderController extends Controller
{
    public function index() {
        session_start();
        $session = isset($_SESSION['user']);
        $user = new User(0, '', '', '', '', '', '', '', '', '', '', new DateTime, '');

        if (!$session) {
            include __DIR__ . '/../views/order/account.php';
        } else {
            $user = $_SESSION['user'];
            //var_dump($user);
            include __DIR__ . '/../views/order/index.php';
        }
    }
}