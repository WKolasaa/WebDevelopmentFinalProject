<?php

class orderService
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new orderRepository();
    }

    public function addOrder($order)
    {
        $this->orderRepository->addOrder($order);
    }
}