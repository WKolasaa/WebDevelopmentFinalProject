<?php
require __DIR__. '/controller.php';

class ThanksController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/thankYouForOrdering/index.php';
    }
}