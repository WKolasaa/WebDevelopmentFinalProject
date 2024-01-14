<?php
require __DIR__ . '/controller.php';
class registercontroller  extends Controller
{
    public function index() {
        require __DIR__ . '/../views/register/index.php';
    }
}