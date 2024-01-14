<?php

class singletonPattern
{
    private static $instance;
    private $loggedUser;

    private function __construct() {
        $this->loggedUser = null;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new singletonPattern();
        }
        return self::$instance;
    }

    public function getLoggedUser() {
        return $this->loggedUser;
    }

    public function setLoggedUser($loggedUser) {
        $this->loggedUser = $loggedUser;
    }

    public function logout() {
        $this->loggedUser = null;
    }

    public function isLoggedIn() {
        return $this->loggedUser != null;
    }
}