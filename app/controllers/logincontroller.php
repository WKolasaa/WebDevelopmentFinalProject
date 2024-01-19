<?php

use App\Models\User;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';
//require_once __DIR__ . '/../models/user.php';

class LoginController extends Controller
{
    public function index() {
        require_once __DIR__ . '/../views/login/index.php';
    }

    public function login(){
        $loginInput = $_POST['username'];
        $password = $_POST['password'];
        $userService = new UserService();
        if(filter_var($loginInput, FILTER_VALIDATE_EMAIL)){
            $user = $userService->loginByEmail($loginInput, $password);
        }else{
            $user = $userService->loginByUserName($loginInput, $password);
        }

        if($user){
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['userClass'] = new User((int)$user['userID'], $user['userName'], $user['firstName'], $user['lastName'], $user['email'], $user['password'], $user['phone'], $user['address'], $user['address2'], $user['country'], $user['zip'], new DateTime($user['dateOfBirth']), $user['role']);
            header('Location: /');
        }else{
            echo "Wrong username or password";
        }
    }
}