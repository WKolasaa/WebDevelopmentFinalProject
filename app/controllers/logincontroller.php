<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../views/shared/singletonPattern.php';

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
            Singleton::getInstance()->setLoggedUser($user);
            header('Location: /');
        }else{
            echo "Wrong username or password";
        }
    }
}