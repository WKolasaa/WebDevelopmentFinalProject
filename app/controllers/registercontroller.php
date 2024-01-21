<?php

use App\Models\user;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';

class registercontroller  extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
        ob_start();
    }


    public function index() {
        require __DIR__ . '/../views/register/index.php';
    }

    public function createAnAccount(){
        $service = new UserService();
        $tmpID = 0;

        $maxUserIdResult = $service->getBiggestId();

        if (is_array($maxUserIdResult) && isset($maxUserIdResult['MAX(userID)'])) {
            $tmpID = $maxUserIdResult['MAX(userID)'] + 1;
        }

        $user = new User($tmpID, $_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['phone'], $_POST['address'], $_POST['address2'], $_POST['country'], $_POST['zip'], new DateTime($_POST['dateOfBirth']), 'user');

        $rows = $service->register($user);

        $userArray = array();
        $userArray['userID'] = $tmpID;
        $userArray['userName'] = $_POST['userName'];
        $userArray['firstName'] = $_POST['firstName'];
        $userArray['lastName'] = $_POST['lastName'];
        $userArray['email'] = $_POST['email'];
        $userArray['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userArray['phone'] = $_POST['phone'];
        $userArray['address'] = $_POST['address'];
        $userArray['address2'] = $_POST['address2'];
        $userArray['country'] = $_POST['country'];
        $userArray['zip'] = $_POST['zip'];
        $userArray['dateOfBirth'] = new DateTime($_POST['dateOfBirth']);
        $userArray['role'] = 'user';

        if($user){
            session_start();
            $_SESSION['userClass'] = $user;
            $_SESSION['user'] = $userArray;
            header('Location: /');
        }else{
            header('Location: /register');
        }
    }
}