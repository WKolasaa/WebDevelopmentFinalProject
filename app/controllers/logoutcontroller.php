<?php
require_once __DIR__ . '/../views/shared/singletonPattern.php';
class logoutcontroller
{
    public function index() {
        Singleton::getInstance()-> logout();
        require __DIR__ . '/../views/logout/index.php';
    }
}