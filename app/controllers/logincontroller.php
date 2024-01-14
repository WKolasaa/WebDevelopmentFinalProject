<?php
require __DIR__ . '/controller.php';
class logincontroller extends Controller
{
    public function index() {
        require __DIR__ . '/../views/login/index.php';
    }

    public function login(){
        $loginInput = $_POST['username'];
        $password = $_POST['password'];
        $userService = new \app\services\userservice();
        if(filter_var($loginInput, FILTER_VALIDATE_EMAIL)){
            $user = $userService->loginByEmail($loginInput, $password);
        }else{
            $user = $userService->loginByUserName($loginInput, $password);
        }

        if($user){
            $singleton = \app\services\Singleton::getInstance();
            $singleton -> setLoggedUser($user);
            $_SESSION['user'] = $user;
            header('Location: /');
        }else{
            header('Location: /login');
        }
    }
}