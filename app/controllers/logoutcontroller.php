<?php
class logoutcontroller
{
    public function index() {
        session_start();
        $_SESSION['user'] = null;
        session_destroy();

        header('Location: /');
    }
}