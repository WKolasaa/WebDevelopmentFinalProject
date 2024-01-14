<?php

class userService
{
    public function loginByUserName($userName, $password){
        $userRepository = new \App\Repositories\UserRepository();
        $user = $userRepository->findUserByUsername($userName);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function loginByEmail($email, $password){
        $userRepository = new \App\Repositories\UserRepository();
        $user = $userRepository->findUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function register($user){
        $userRepository = new \App\Repositories\UserRepository();
        $user = $userRepository->createUser($user);
        return $user;
    }
}