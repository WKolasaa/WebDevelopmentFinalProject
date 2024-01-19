<?php
include __DIR__ . '/../repositories/userRepository.php';

class UserService
{
    private $userRepository;
    public function __construct()
    {
    }

    public function loginByUserName($userName, $password){
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUserName($userName);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function loginByEmail($email, $password){
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return null;
    }

    public function register($user){
        $userRepository = new UserRepository();
        return $userRepository->createUser($user);
    }

    public function getBiggestId(){
        $userRepository = new UserRepository();
        $user = $userRepository->getBiggestId();
        return $user;
    }
}