<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../views/shared/singletonPattern.php';

class registercontroller  extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
        ob_start();
    }


    public function index() {
        ob_end_clean();
        require __DIR__ . '/../views/register/index.php';
    }

    public function createAnAccount(){
        $user = array();
        $user['username'] = $_POST['userName'];
        $user['email'] = $_POST['email'];
        $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user['firstName'] = $_POST['firstName'];
        $user['lastName'] = $_POST['lastName'];
        $user['phone'] = $_POST['phone'];
        $user['address'] = $_POST['address'];
        $user['dateOfBirth'] = $_POST['dateOfBirth'];
        $user['role'] = 'user';
        $service = new UserService();
        $user['userID'] = $service->getBiggestId()['MAX(userID)'] + 1;
        $user = $service->register($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $user['password'], $_POST['phone'], $_POST['address'], $_POST['dateOfBirth'], 'user');
        if($user){
            $singleton = Singleton::getInstance();
            $singleton -> setLoggedUser($user);
            $_SESSION['user'] = $user;
            header('Location: /');
        }else{
            header('Location: /register');
        }
    }
}