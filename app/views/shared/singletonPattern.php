<?php

class Singleton
{
    private static $instance;
    private $loggedUser;

    private function __construct() {
        $this->loggedUser = null;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
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
        if($this->loggedUser == null){
            return false;
        }
        else{
            return true;
        }
    }
}